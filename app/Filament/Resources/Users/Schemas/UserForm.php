<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Permission;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

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
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    // Optional fields say so (Filament Storybook: forms-record-form); a new user needs one, an existing user keeps theirs.
                    ->label(fn (string $operation): string => $operation === 'create' ? 'Password' : 'Password (optional)')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn (?string $state): bool => filled($state)),
                Select::make('roles')
                    ->label('Roles (optional)')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->disabled(fn (): bool => ! auth()->user()?->can(Permission::ManageUsers->value)),
                SpatieTagsInput::make('tags')
                    ->label('Tags (optional)'),
            ]);
    }
}
