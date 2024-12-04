<?php

namespace LeetoDigitalAgency\CookieConsent;

use Illuminate\Support\ServiceProvider;
use LeetoDigitalAgency\CookieConsent\Commands\CookieConsentCommand;

class CookieConsentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/gdpr-cookie-consent.php' => config_path('gdpr-cookie-consent.php'),
            ], 'gdpr-cookie-consent-config');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/gdpr-cookie-consent'),
            ], 'gdpr-cookie-consent-public');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/gdpr-cookie-consent'),
            ], 'gdpr-cookie-consent-views');

            $this->commands([
                CookieConsentCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gdpr-cookie-consent');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gdpr-cookie-consent');
        $this->mergeConfigFrom(__DIR__.'/../config/gdpr-cookie-consent.php', 'gdpr-cookie-consent');

        // blade directive
        \Blade::directive('cookie_consent_js', static function () {
            return "<?php echo view('gdpr-cookie-consent::cookie-consent-js'); ?>";
        });
        \Blade::directive('cookie_consent_modal', static function () {
            return "<?php echo view('gdpr-cookie-consent::cookie-consent-modal'); ?>";
        });

    }
}
