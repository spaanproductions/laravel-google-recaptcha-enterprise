<?php

namespace SpaanProductions\LaravelGoogleRecaptchaEnterprise\Rules;

use Illuminate\Contracts\Validation\Rule;
use SpaanProductions\LaravelGoogleRecaptchaEnterprise\LaravelGoogleRecaptchaEnterprise;

class GoogleRecaptchaRule implements Rule
{
	public function passes($attribute, $value)
	{
		try {
            /** @var LaravelGoogleRecaptchaEnterprise $api */
			$api = resolve(LaravelGoogleRecaptchaEnterprise::class);
			$score = $api->create_assessment(
				recaptchaKey: config('google-recaptcha-enterprise.sitekey'),
				token: $value,
				project: config('google-recaptcha-enterprise.project-id'),
				action: 'submit'
			);
		} catch (\Exception $exception) {
			return false;
		}

		return $score >= config('google-recaptcha-enterprise.score-threshold');
	}

	public function message()
	{
		return 'Google Recaptcha Failed.';
	}
}
