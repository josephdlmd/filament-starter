<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;

    /** The address documents are emailed from; replies come back to it. */
    public ?string $company_email;

    public static function group(): string
    {
        return 'general';
    }
}
