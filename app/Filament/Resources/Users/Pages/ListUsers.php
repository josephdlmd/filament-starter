<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use App\Notifications\UserInvitation;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Spatie\Permission\Models\Role;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            static::inviteAction(),
        ];
    }

    /**
     * New users are invited by email and set their own password; no one else ever knows it
     * (Filament Storybook: actions-invite-a-user).
     */
    public static function inviteAction(): Action
    {
        return Action::make('invite')
            ->label('Invite user')
            ->authorize('create', User::class)
            ->modalDescription('They get an email with a link to set their own password. The link works for 7 days.')
            ->schema([
                TextInput::make('name')
                    ->maxLength(255)
                    ->maxWidth('md')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->maxLength(254)
                    ->extraInputAttributes(['spellcheck' => 'false'])
                    ->maxWidth('md')
                    ->unique(User::class)
                    ->required()
                    ->validationMessages(['unique' => 'A user with this email address already exists']),
                Select::make('roles')
                    ->label('Roles (optional)')
                    ->options(fn (): array => Role::query()->orderBy('name')->pluck('name', 'name')->all())
                    ->multiple()
                    ->maxWidth('md'),
            ])
            ->action(function (array $data, Action $action): void {
                $user = User::forceCreate(['name' => $data['name'], 'email' => $data['email'], 'password' => null, 'invited_at' => now()]);
                $user->syncRoles($data['roles'] ?? []);
                $user->notify(new UserInvitation);

                $action->successNotificationTitle("Invitation sent to {$user->email}");
                $action->success();
            });
    }
}
