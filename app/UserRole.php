<?php

namespace App;

enum UserRole: string
{
    case SUPERADMIN = 'superadmin';
    case ADMIN = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::SUPERADMIN => 'Superadmin',
            self::ADMIN => 'Admin',
        };
    }

    public static function options(): array
    {
        $options = [];

        foreach (self::cases() as $role) {
            $options[$role->value] = $role->label();
        }

        return $options;
    }
}
