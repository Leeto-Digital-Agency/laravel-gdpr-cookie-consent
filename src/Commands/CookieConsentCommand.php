<?php

namespace LeetoDigitalAgency\CookieConsent\Commands;

use Illuminate\Console\Command;

class CookieConsentCommand extends Command
{
    public $signature = 'laravel-gdpr-cookie-consent';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
