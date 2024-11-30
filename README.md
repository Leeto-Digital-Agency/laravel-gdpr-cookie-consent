<p align="center">
    <a href="https://leetodigitalagency.com/" target="_blank">
        <img src="https://leetodigitalagency.com/assets/images/logo/logo.png" alt="ariap"/>
    </a>
</p>

## Installation

You can install the package via composer:

```bash
composer require leeto-digital-agency/laravel-gdpr-cookie-consent
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-gdpr-cookie-consent-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-gdpr-cookie-consent-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-gdpr-cookie-consent-views"
```

## Usage

```php
$cookieConsent = new LeetoDigitalAgency\CookieConsent();
echo $cookieConsent->echoPhrase('Hello, LeetoDigitalAgency!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Zenel Rrushi](https://github.com/leli1337)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
