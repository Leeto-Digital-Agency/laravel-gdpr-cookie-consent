<?php

return [
    'enabled' => env('GDPR_COOKIE_CONSENT_ENABLED', true),
    'mmdb_path' => env('GDPR_COOKIE_CONSENT_MMDB_PATH', storage_path('GeoLite2-Country.mmdb')),
    'cookie_consent_name' => 'cookie_consent',
    'necessary' => [
        'description' => 'Necessary cookies help make a website usable by enabling basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.',
        'groups' => [
            'app' => [
                'title' => 'Application',
                'cookies' => [
                    'cookie_consent' => [
                        'duration' => '1 year',
                        'type' => 'Http Cookie',
                    ],
                    'consent_token' => [
                        'duration' => 'Persistent',
                        'type' => 'HTML Local Storage',
                    ],
                ],
            ],
        ],
    ],
    'analytics' => [
        'description' => 'Statistic cookies help website owners to understand how visitors interact with websites by collecting and reporting information anonymously.',
        'groups' => [
            'google_analytics' => [
                'title' => 'Google Analytics',
                'cookies' => [

                ],
            ],
        ],
    ],
    'marketing' => [
        'description' => 'Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third party advertisers.',
        'groups' => [
            'facebook_pixel' => [
                'title' => 'Facebook Pixel',
                'cookies' => [

                ],
            ],
        ],
    ],
];
