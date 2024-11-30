<?php

namespace LeetoDigitalAgency\CookieConsent\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Date;
use LeetoDigitalAgency\CookieConsent\Models\CookieConsent;

class CookieConsentController extends Controller
{
    public function getCookiePreference(): JsonResponse
    {
        $consentToken = request()->get('consent_token');
        $cookieConsent = CookieConsent::where('consent_token', $consentToken)->first();

        return response()->json($cookieConsent);
    }

    public function setCookiePreference(): JsonResponse
    {
        $consentToken = request()->get('consent_token');
        $consentPreferences = request()->get('cookie_references');
        $consentedAt = Date::now();
        $cookieConsent = CookieConsent::updateOrCreate(
            ['consent_token' => $consentToken],
            ['consent_preferences' => $consentPreferences, 'consented_at' => $consentedAt]
        );

        return response()->json($cookieConsent);
    }
}
