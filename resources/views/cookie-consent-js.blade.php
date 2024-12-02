@php
    $cookieConsentConfig = config('gdpr-cookie-consent');
    $enabled = $cookieConsentConfig['enabled'];
    if (!$enabled) {
        return;
    }
    $cookieName = $cookieConsentConfig['cookie_consent_name'];
@endphp
<script src="{{ url('vendor/gdpr-cookie-consent/js/cookie-consent.js') }}" onload="new CookiesConsent({cookieName: '{{$cookieName}}'});"></script>
<link rel="stylesheet" href="{{ url('vendor/gdpr-cookie-consent/css/cookie-consent.css') }}">
