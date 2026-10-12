<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /** The address documents are emailed from (owner, 2026-10-12; Filament Storybook: actions-email-document). */
    public function up(): void
    {
        $this->migrator->add('general.company_email', config('company.email'));
    }
};
