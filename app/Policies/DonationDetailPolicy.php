<?php

namespace App\Policies;

use App\Models\DonationDetail;
use App\Models\User;

class DonationDetailPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->canManageUsers();
    }

    public function view(User $user, DonationDetail $donationDetail): bool
    {
        return $user->canManageUsers();
    }

    public function create(User $user): bool
    {
        return $user->canManageUsers();
    }

    public function update(User $user, DonationDetail $donationDetail): bool
    {
        return $user->canManageUsers();
    }

    public function delete(User $user, DonationDetail $donationDetail): bool
    {
        return $user->isSuperadmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isSuperadmin();
    }

    public function restore(User $user, DonationDetail $donationDetail): bool
    {
        return $user->isSuperadmin();
    }

    public function restoreAny(User $user): bool
    {
        return $user->isSuperadmin();
    }

    public function forceDelete(User $user, DonationDetail $donationDetail): bool
    {
        return $user->isSuperadmin();
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->isSuperadmin();
    }
}
