<?php

use App\Providers\AppServiceProvider;
use App\Settings\GeneralSettings;

it('sends documents from the billing email address on the Settings page', function () {
    app(GeneralSettings::class)->fill(['company_email' => 'billing@example.ph'])->save();

    (new AppServiceProvider(app()))->boot();

    expect(config('company.email'))->toBe('billing@example.ph');
});
