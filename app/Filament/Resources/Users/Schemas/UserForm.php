<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Permission;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                SpatieMediaLibraryFileUpload::make('avatar')
                    ->label('Avatar (optional)')
                    ->collection('avatars')
                    ->avatar()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->maxSize(2048)
                    ->helperText('JPG or PNG, up to 2 MB'),
                TextInput::make('name')
                    ->required()
                    ->maxWidth('md'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxWidth('md'),
                // Several from five or fewer: a checkbox list (Filament Storybook: forms-choice).
                CheckboxList::make('roles')
                    ->label('Roles (optional)')
                    ->relationship('roles', 'name', fn (Builder $query): Builder => $query->orderBy('name'))
                    ->getOptionLabelFromRecordUsing(fn (Role $role): string => Str::headline($role->name))
                    ->disabled(fn (): bool => ! auth()->user()?->can(Permission::ManageUsers->value)),
                SpatieTagsInput::make('tags')
                    ->label('Tags (optional)')
                    // Each input is about as wide as its answer (Filament Storybook: forms-record-form).
                    ->maxWidth('md'),
            ]);
    }
}
