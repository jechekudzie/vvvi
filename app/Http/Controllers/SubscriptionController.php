<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\Exceptions\NumberParseException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;


class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Custom validation messages
        $messages = [
            'phone.phone' => 'The phone number is invalid or does not match the selected country code.',
        ];
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'country_code' => 'required',
            'phone' => 'required|phone:' . $request->input('country_code'),
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            Log::error('Validation Errors:', $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Retrieve and format the phone number with country code
            $phone = phone($request->input('phone'), $request->input('country_code'))->formatE164();

            // Save the subscription
            Subscription::create([
                'email' => $request->input('email'),
                'country_code' => $request->input('country_code'),
                'phone' => $phone,
            ]);

        } catch (NumberParseException $e) {
            Log::error('Phone Number Parsing Exception:', ['exception' => $e->getMessage()]);
            return redirect()->back()->withErrors(['phone' => 'The phone number is invalid or does not match the selected country code.'])->withInput();
        }
        return back()->with('success', 'Subscription successful!');
    }


    public function fetchAndCacheCountryCodes()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = json_decode($response->getBody()->getContents(), true);

        $countryCodes = [];
        foreach ($countries as $country) {
            if (isset($country['cca2']) && isset($country['idd']['root'])) {
                $callingCode = $country['idd']['root'] . (isset($country['idd']['suffixes'][0]) ? $country['idd']['suffixes'][0] : '');
                $countryCodes[] = [
                    'name' => $country['name']['common'],
                    'code' => $country['cca2'],
                    'calling_code' => $callingCode,
                ];
            }
        }

        // Cache for 1 year
        Cache::put('country_codes', $countryCodes, now()->addYear());

        return $countryCodes;
    }


}
