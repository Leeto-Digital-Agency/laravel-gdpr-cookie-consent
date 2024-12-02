<?php

namespace LeetoDigitalAgency\CookieConsent\Service;

use MaxMind\Db\Reader;

class GdprService
{
    private static ?Reader $reader = null;

    public static function userInEu(): bool
    {
        $ip = self::getUserIp();
        $reader = self::getReader();
        /** @var array<string, mixed> $data */
        $data = $reader->get($ip);
        return (bool)($data['country']['is_in_european_union'] ?? false);

    }
    private static function getUserIp(): string
    {
        foreach (
            array(
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWARDED_FOR',
                'HTTP_X_FORWARDED',
                'HTTP_X_CLUSTER_CLIENT_IP',
                'HTTP_FORWARDED_FOR',
                'HTTP_FORWARDED',
                'REMOTE_ADDR'
            ) as $key
        ) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var(
                            $ip,
                            FILTER_VALIDATE_IP,
                            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                        ) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return $_SERVER['REMOTE_ADDR'];
    }
    private static function getReader(): Reader
    {
        if (self::$reader === null) {
            /** @var string $path */
            $path = config('gdpr-cookie-consent.mmdb_path');
            self::$reader = new Reader($path);
        }
        return self::$reader;
    }
}
