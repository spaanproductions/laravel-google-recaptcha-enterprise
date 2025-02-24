# This is my package laravel-google-recaptcha-enterprise

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spaanproductions/laravel-google-recaptcha-enterprise.svg?style=flat-square)](https://packagist.org/packages/spaanproductions/laravel-google-recaptcha-enterprise)
[![Total Downloads](https://img.shields.io/packagist/dt/spaanproductions/laravel-google-recaptcha-enterprise.svg?style=flat-square)](https://packagist.org/packages/spaanproductions/laravel-google-recaptcha-enterprise)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require spaanproductions/laravel-google-recaptcha-enterprise
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-google-recaptcha-enterprise-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-google-recaptcha-enterprise-views"
```

## Usage

Add the Captcha Scripts tot the `<head>` of the page
```bladehtml
<head>
@captchaScripts()
</head>
```

Use the recaptcha button instead of the submit button
```bladehtml
<x-recaptcha-submit-button class="custom-classes">
    Submit
</x-recaptcha-submit-button>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sonny Spaan](https://github.com/spaanproductions)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
