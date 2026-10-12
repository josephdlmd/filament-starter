<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Auth\AcceptInvitation;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use App\Notifications\UserInvitation;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\SpatieTagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // The readable identifier comes first (Filament Storybook: tables-list-table).
                TextColumn::make('name')
                    ->searchable(),
                // Not a link: a user without an avatar would leave an empty link that screen readers announce as just "link".
                SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection('avatars')
                    ->circular()
                    ->disabledClick()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                // Invited until they set a password; Expired after 7 days, when the admin needs to send it again
                // (Filament Storybook: actions-invite-a-user).
                TextColumn::make('status')
                    ->state(fn (?User $record): string => match (true) {
                        $record?->password !== null => 'Active',
                        $record && AcceptInvitation::isOpen($record) => 'Invited',
                        default => 'Expired',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Invited' => 'info',
                        'Expired' => 'warning',
                        default => 'success',
                    }),
                TextColumn::make('roles.name')
                    ->badge(),
                SpatieTagsColumn::make('tags')
                    ->disabledClick(),
                TextColumn::make('email_verified_at')
                    ->dateTime('M j, Y g:i A T')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('M j, Y g:i A T')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('M j, Y g:i A T')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->searchPlaceholder('Search by name or email')
            ->emptyStateDescription('People you invite can log in to the panel.')
            ->emptyStateActions([
                // The page header already has the primary Invite button (Filament Storybook: tables-list-table).
                ListUsers::inviteAction()->outlined(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->visible(fn (?User $record): bool => $record?->password !== null),
                Action::make('sendAgain')
                    ->label('Send again')
                    ->authorize('update')
                    ->visible(fn (?User $record): bool => $record !== null && $record->password === null)
                    ->action(function (User $record, Action $action): void {
                        // A new send time makes a new link and stops the old one.
                        $record->forceFill(['invited_at' => now()])->save();
                        $record->notify(new UserInvitation);

                        $action->successNotificationTitle("Invitation sent again to {$record->email}");
                        $action->success();
                    }),
                Action::make('withdraw')
                    ->label('Withdraw invitation')
                    ->color('danger')
                    ->authorize('delete')
                    ->visible(fn (?User $record): bool => $record !== null && $record->password === null)
                    ->requiresConfirmation()
                    ->modalHeading(fn (?User $record): string => "Withdraw invitation to {$record?->name}?")
                    ->modalDescription('Their link stops working. You can invite them again later.')
                    ->modalSubmitActionLabel('Withdraw')
                    ->action(function (User $record, Action $action): void {
                        // Only while they haven't set a password: an active user is deleted with Delete selected.
                        if ($record->password === null) {
                            $record->delete();
                        }

                        $action->successNotificationTitle("Invitation to {$record->email} withdrawn");
                        $action->success();
                    }),
            ])
            // Bulk actions are buttons once a row is ticked, not a "Bulk actions" menu (Filament Storybook: tables-bulk-actions).
            ->toolbarActions([
                DeleteBulkAction::make()
                    ->authorizeIndividualRecords()
                    ->modalDescription('They can no longer log in, and their avatars are deleted. Their activity log entries stay. This cannot be undone.'),
            ]);
    }
}
