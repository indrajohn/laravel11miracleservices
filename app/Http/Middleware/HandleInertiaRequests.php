<?php

namespace App\Http\Middleware;

use App\Models\DailyVerse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $locale = $request->session()->get('locale') ?? 'en';
        $langFile = base_path("lang/{$locale}/messages.php");
        $dailyVerse = DailyVerse::where('lang', $locale)
                                 ->whereDate('created_at', Carbon::today())
                                 ->first();

        $defaultHead = [
            'title' => 'Gereja Bethel Indonesia - Miracle Services Sydney Australia',
            'meta' => [
                [
                    'name' => 'description',
                    'content' => 'Explore the historical journey of GBI Miracle Service Sydney, a vibrant community of believers under the leadership of Pastor Dr. Ir. Niko Njotorahardjo. Discover their humble beginnings, the development of their permanent place of worship, and the ongoing spiritual guidance of Pastor Dr. Timotius Hardono. Join them in worship and witness the love and miracles of God.',
                ],
                [
                    'property' => 'og:title',
                    'content' => 'Miracle Services Sydney Australia',
                ],
                [
                    'name' => 'robots',
                    'content' => 'index, follow',
                ],
                [
                    'name' => 'googlebot',
                    'content' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
                ],
                [
                    'name' => 'bingbot',
                    'content' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
                ],
                [
                    'property' => 'og:type',
                    'content' => 'website',
                ],
                [
                    'property' => 'og:description',
                    'content' => 'Explore the historical journey of GBI Miracle Service Sydney, a vibrant community of believers under the leadership of Pastor Dr. Ir. Niko Njotorahardjo. Discover their humble beginnings, the development of their permanent place of worship, and the ongoing spiritual guidance of Pastor Dr. Timotius Hardono. Join them in worship and witness the love and miracles of God.',
                ],
                [
                    'property' => 'og:url',
                    'content' => 'http://www.gbimssydney.org.au/',
                ],
                [
                    'property' => 'og:site_name',
                    'content' => 'GBI Miracle Service Sydney',
                ],
                [
                    'property' => 'og:image',
                    'content' => '/img/default.png',
                ],
            ],
            'link' => [
                [
                    'rel' => 'icon',
                    'href' => '/favicon.ico',
                    'type' => 'image/x-icon',
                ],
            ],
        ];
        return array_merge(parent::share($request), [
            'recaptcha_site_key' => config('services.google_recaptcha.site_key'),
            'head' => $defaultHead,
            'messages' => function () use ($langFile) {
                return file_exists($langFile) ? require_once $langFile : [];
            },
            'auth' => [
                'user' => $request->user(),
            ],
            'dailyVerse' => function () use ($dailyVerse) {
                return $dailyVerse ?? "No daily verse available for today.";
            },
            'settings' => [
                'timezone' => config('app.timezone'),
                'locale' => $locale
            ],
        ]);
    }
}
