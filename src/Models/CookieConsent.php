<?php

namespace LeetoDigitalAgency\CookieConsent\Models;

use Illuminate\Database\Eloquent\Model;

class CookieConsent extends Model
{
    protected $table = 'cookie_consents';

    protected $fillable = ['consent_token', 'consent_preferences', 'policy_version', 'consented_at'];

    protected $casts = [
        'consent_preferences' => 'array',
        'consented_at' => 'datetime',
    ];
}
