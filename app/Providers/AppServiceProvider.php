<?php

namespace App\Providers;

use App\Policies\ActivityPolicy;
use App\Settings\GeneralSettings;
use Filament\Support\Facades\FilamentTimezone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Surface lazy loading, silently discarded attributes and missing attributes outside production.
        Model::shouldBeStrict(! $this->app->isProduction());

        FilamentTimezone::set(config('app.display_timezone'));

        // Documents are emailed from the address on the Settings page (Filament Storybook: actions-email-document). Before
        // the settings table exists (a fresh install, migrating), config/company.php's value stays.
        config(['company.email' => rescue(fn (): ?string => app(GeneralSettings::class)->company_email, null, report: false) ?? config('company.email')]);

        // Vendor models are outside App\Models, so their policies are not auto-discovered.
        Gate::policy(Activity::class, ActivityPolicy::class);
    }
}
