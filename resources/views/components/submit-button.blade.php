<button {{ $attributes->class(['g-recaptcha'])->merge([
    'type' => 'submit',
    'data-sitekey' => config('google-recaptcha-enterprise.sitekey'),
    'data-callback' => 'onSubmit',
    'data-action' => 'submit',
]) }}>{{ $slot }}</button>
