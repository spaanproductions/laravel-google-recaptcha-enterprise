<?php

namespace SpaanProductions\LaravelGoogleRecaptchaEnterprise\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SubmitButton extends Component
{
    public function render(): View
    {
        return view('google-recaptcha-enterprise::components.submit-button');
    }
}
