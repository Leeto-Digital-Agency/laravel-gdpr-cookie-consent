<?php

$router = app('router');
// get gdpr-cookie-preference
$router->get('gdpr-cookie-preference', 'LeetoDigitalAgency\CookieConsent\Http\Controllers\CookieConsentController@getCookiePreference');
// set gdpr-cookie-preference
$router->post('gdpr-cookie-preference', 'LeetoDigitalAgency\CookieConsent\Http\Controllers\CookieConsentController@setCookiePreference');
