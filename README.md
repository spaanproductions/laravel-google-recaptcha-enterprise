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

Create a recaptcha key in the Google Console:
https://console.cloud.google.com/security/recaptcha

Create a Service Account in the same project with the role: `reCAPTCHA Enterprise Agent` via:
https://console.cloud.google.com/iam-admin/serviceaccounts

Than add an key with the JSON type in that service account. And add the credentials from that JSON in your `.env`:
```dotenv
# Google Recaptcha (enterprise)
GOOGLE_RECAPTCHA_SITEKEY="<recaptcha_id>"
GOOGLE_RECAPTCHA_PROJECT_ID="<project_id>"
RECAPTCHA_ENTERPRISE_PRIVATE_KEY_ID="<private_key_id>"
RECAPTCHA_ENTERPRISE_PRIVATE_KEY="<private_key>"
RECAPTCHA_ENTERPRISE_CLIENT_EMAIL="<client_email>"
RECAPTCHA_ENTERPRISE_CLIENT_ID="<client_id>"

# Optional
GOOGLE_RECAPTCHA_SCORE_THRESHOLD=0.7
```

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
