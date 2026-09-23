<?php

namespace App\Enums;

/**
 * Roles group permissions. Authorization checks should target a Permission, never a Role.
 */
enum Role: string
{
    case Admin = 'admin';
    case Staff = 'staff';
    case Viewer = 'viewer';

    /**
     * @return list<Permission>
     */
    public function permissions(): array
    {
        return match ($this) {
            self::Admin => Permission::cases(),
            self::Staff => [Permission::ViewUsers],
            self::Viewer => [],
        };
    }
}
