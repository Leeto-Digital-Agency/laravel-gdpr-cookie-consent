<?php

namespace LeetoDigitalAgency\CookieConsent\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LeetoDigitalAgency\CookieConsent\CookieConsent
 */
class CookieConsent extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \LeetoDigitalAgency\CookieConsent\CookieConsent::class;
    }
}
