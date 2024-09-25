<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

class Role extends Enum
{
    public const ADMIN = 'ROLE_ADMIN';
    public const USER = 'ROLE_USER';

    public static function getRoles(): array
    {
        return [
            'Administrateur' => Role::ADMIN,
            'Utilisateur' => Role::USER,
        ];
    }

}

