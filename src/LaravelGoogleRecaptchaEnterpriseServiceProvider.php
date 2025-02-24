<?php

namespace SpaanProductions\LaravelGoogleRecaptchaEnterprise;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SpaanProductions\LaravelGoogleRecaptchaEnterprise\Commands\LaravelGoogleRecaptchaEnterpriseCommand;

class LaravelGoogleRecaptchaEnterpriseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-google-recaptcha-enterprise')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_google_recaptcha_enterprise_table')
            ->hasCommand(LaravelGoogleRecaptchaEnterpriseCommand::class);
    }
}
