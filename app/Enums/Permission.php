<?php

namespace App\Enums;

enum Permission: string
{
    case ViewUsers = 'view users';
    case ManageUsers = 'manage users';
    case ManageSettings = 'manage settings';
    case ViewActivityLog = 'view activity log';
}
