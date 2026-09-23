<?php

namespace App\Policies;

use App\Enums\Permission;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

/**
 * The audit trail is append-only: it can be read with permission, never changed from the panel.
 */
class ActivityPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(Permission::ViewActivityLog->value);
    }

    public function view(User $user, Activity $activity): bool
    {
        return $user->can(Permission::ViewActivityLog->value);
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Activity $activity): bool
    {
        return false;
    }

    public function delete(User $user, Activity $activity): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }
}
