<?php

namespace SpaanProductions\LaravelGoogleRecaptchaEnterprise\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SpaanProductions\LaravelGoogleRecaptchaEnterprise\LaravelGoogleRecaptchaEnterprise
 */
class LaravelGoogleRecaptchaEnterprise extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SpaanProductions\LaravelGoogleRecaptchaEnterprise\LaravelGoogleRecaptchaEnterprise::class;
    }
}
