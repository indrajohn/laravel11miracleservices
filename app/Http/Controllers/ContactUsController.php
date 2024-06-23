<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Jobs\SendContactUsEmail;
use App\Mail\ContactUsEmail;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Log;
class ContactUsController extends Controller
{
        public function store(StoreContactUsRequest $request) // Use the correct request class
        {
            Log::info('ContactUsController@store - Start method');
            try {
            $validated = $request->validated(); // This will work if StoreContactUsRequest is correctly set up
            Log::info('ContactUsController@store - Validated Data:', $validated);


                $contact = ContactUs::create($validated);
                dispatch(new SendContactUsEmail($validated));
                Log::info('ContactUsController@store - Contact Saved:', $contact->toArray());
                return redirect()->back()->with('success', 'Your message has been sent successfully!');
            } catch (\Exception $e) {
                Log::error('ContactUsController@store - Error saving contact:', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);

                return redirect()->back()->with('error', 'Failed to save your message.');
            }
        }

}
