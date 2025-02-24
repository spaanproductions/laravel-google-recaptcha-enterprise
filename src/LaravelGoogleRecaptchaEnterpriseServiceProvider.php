<?php

namespace SpaanProductions\LaravelGoogleRecaptchaEnterprise;

use Spatie\LaravelPackageTools\Package;
use Illuminate\View\Compilers\BladeCompiler;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SpaanProductions\LaravelGoogleRecaptchaEnterprise\View\Components\SubmitButton;

class LaravelGoogleRecaptchaEnterpriseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /** More info: https://github.com/spatie/laravel-package-tools */
        $package
            ->name('laravel-google-recaptcha-enterprise')
            ->hasConfigFile()
            ->hasViewComponent('recaptcha', SubmitButton::class)
            ->hasViews();
    }

    public function register(): void
    {
        parent::register();

        $this->app->afterResolving('blade.compiler', function () {
            $this->addBladeDirective($this->app['blade.compiler']);
        });
    }

    protected function addBladeDirective(BladeCompiler $blade): void
    {
        $blade->directive('captchaScripts', function ($arguments) {
            return "<?php echo \SpaanProductions\LaravelGoogleRecaptchaEnterprise\Facades\LaravelGoogleRecaptchaEnterprise::script({$arguments}); ?>";
        });
    }
}
