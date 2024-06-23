<?php

namespace App\Console\Commands;

use App\Models\DailyVerse as ModelsDailyVerse;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpClient\HttpClient;

class DailyVerse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyverse:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Verse update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->fetchAndSaveVerse('en');
    }

    private function fetchAndSaveVerse($lang)
    {
        info("Daily Verse update running at " . now() . " for language: $lang");
        Log::info('Daily Verse update running at ' . now() . " for language: $lang");

        $base_url = "https://beta.ourmanna.com/api/v1/get?format=json&order=daily";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disable SSL verification for development purposes
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $responseText = curl_exec($ch);

        if ($responseText === false) {
            Log::error('Curl error: ' . curl_error($ch));
            curl_close($ch);
            return;
        }

        curl_close($ch);

        $result = json_decode($responseText, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON decode error: ' . json_last_error_msg());
            return;
        }

        Log::info('Daily Verse: ', $result);

        if (isset($result['verse']['details'])) {
            $dailyverse = new ModelsDailyVerse();
            $dailyverse->message = $result['verse']['details']['text'];
            $dailyverse->reference = $result['verse']['details']['reference'];
            $dailyverse->version = $result['verse']['details']['version'];
            $dailyverse->lang = 'en';
            $dailyverse->save();

            $this->fetchAndSaveIndonesianVerse($result['verse']['details']['reference']);
        } else {
            Log::error('Invalid response structure', $result);
        }
    }

    private function fetchAndSaveIndonesianVerse($reference)
    {
        info("Fetching Indonesian translation for reference: " . $reference);
        Log::info("Fetching Indonesian translation for reference: " . $reference);

        $passageUrl = 'https://alkitab.sabda.org/api/passage.php?passage=' . urlencode($reference);

        $client = HttpClient::create();
        $response = $client->request('GET', $passageUrl);

        if ($response->getStatusCode() !== 200) {
            Log::error('Failed to fetch daily verse in Indonesian: ' . $response->getStatusCode());
            return;
        }

        $xmlContent = $response->getContent();

        $xml = simplexml_load_string($xmlContent);

        if ($xml === false) {
            Log::error('Failed to parse XML response.');
            return;
        }

        $verseText = [];
        Log::error('XML : '. $xml);
        foreach ($xml->book->chapter->verses->verse as $verse) {
            $verseText[] = (string)$verse->number . ' ' . (string)$verse->text;
        }

        $fullText = implode(' ', $verseText);

        if (!empty($fullText)) {
            Log::info('Daily Verse in Indonesian: ' . $fullText . ' - ' . $xml->title);

            $dailyverse = new ModelsDailyVerse();
            $dailyverse->message = $fullText;
            $dailyverse->reference = (string)$xml->title;
            $dailyverse->version = 'Alkitab';
            $dailyverse->lang = 'id';
            $dailyverse->save();
        } else {
            Log::error('Failed to find the verse text in the XML content.');
        }
    }
}
