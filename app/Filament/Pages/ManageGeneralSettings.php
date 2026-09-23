<?php

namespace App\Filament\Pages;

use App\Enums\Permission;
use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageGeneralSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'System';

    protected static ?string $navigationLabel = 'Settings';

    protected static string $settings = GeneralSettings::class;

    /**
     * @var array<string, mixed>
     */
    protected array $settingsBeforeSave = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->can(Permission::ManageSettings->value) ?? false;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->helperText('Shown as the panel brand name.')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    protected function beforeSave(): void
    {
        $this->settingsBeforeSave = app(GeneralSettings::class)->toArray();
    }

    protected function afterSave(): void
    {
        $settingsAfterSave = app(GeneralSettings::class)->toArray();

        $changedKeys = array_keys(array_diff_assoc($settingsAfterSave, $this->settingsBeforeSave));

        if ($changedKeys === []) {
            return;
        }

        activity()
            ->event('settings_updated')
            ->withChanges([
                'old' => array_intersect_key($this->settingsBeforeSave, array_flip($changedKeys)),
                'attributes' => array_intersect_key($settingsAfterSave, array_flip($changedKeys)),
            ])
            ->withProperty('group', GeneralSettings::group())
            ->log('general settings updated');
    }
}
