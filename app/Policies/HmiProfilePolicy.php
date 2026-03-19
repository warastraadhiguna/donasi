<?php

namespace App\Policies;

use App\Models\HmiProfile;
use App\Models\User;

class HmiProfilePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->canManageUsers();
    }

    public function view(User $user, HmiProfile $hmiProfile): bool
    {
        return $user->canManageUsers();
    }

    public function create(User $user): bool
    {
        return $user->canManageUsers();
    }

    public function update(User $user, HmiProfile $hmiProfile): bool
    {
        return $user->canManageUsers();
    }

    public function delete(User $user, HmiProfile $hmiProfile): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    public function restore(User $user, HmiProfile $hmiProfile): bool
    {
        return false;
    }

    public function restoreAny(User $user): bool
    {
        return false;
    }

    public function forceDelete(User $user, HmiProfile $hmiProfile): bool
    {
        return false;
    }

    public function forceDeleteAny(User $user): bool
    {
        return false;
    }
}
