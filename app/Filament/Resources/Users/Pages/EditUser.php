<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

/**
 * @property User $record
 */
class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    /**
     * @var list<string>
     */
    protected array $rolesBeforeSave = [];

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->modalDescription('They can no longer sign in, and their avatar is deleted. Their activity log entries stay. This cannot be undone.'),
        ];
    }

    protected function beforeSave(): void
    {
        $this->rolesBeforeSave = $this->record->getRoleNames()->sort()->values()->all();
    }

    /**
     * The roles select syncs the pivot directly, which the model's own activity logging cannot see.
     */
    protected function afterSave(): void
    {
        $rolesAfterSave = $this->record->load('roles')->getRoleNames()->sort()->values()->all();

        if ($rolesAfterSave === $this->rolesBeforeSave) {
            return;
        }

        activity()
            ->performedOn($this->record)
            ->event('roles_updated')
            ->withChanges([
                'old' => ['roles' => $this->rolesBeforeSave],
                'attributes' => ['roles' => $rolesAfterSave],
            ])
            ->log('roles updated');
    }
}
