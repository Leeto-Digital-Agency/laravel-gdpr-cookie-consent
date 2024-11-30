<?php

return [
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
                    'compareCasinos' => [
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
                    '_ga' => [
                        'duration' => '2 years',
                        'type' => 'HTTP Cookie',
                    ],
                    '_gat' => [
                        'duration' => '1 minute',
                        'type' => 'HTTP Cookie',
                    ],
                    '_gid' => [
                        'duration' => '1 day',
                        'type' => 'HTTP Cookie',
                    ],
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
                    '_fbp' => [
                        'duration' => '3 months',
                        'type' => 'HTTP Cookie',
                    ],
                    'fr' => [
                        'duration' => '3 months',
                        'type' => 'HTTP Cookie',
                    ],
                ],
            ],
        ],
    ],
];
