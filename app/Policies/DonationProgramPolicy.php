<?php

namespace App\Policies;

use App\Models\DonationProgram;
use App\Models\User;

class DonationProgramPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->canManageUsers();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DonationProgram $donationProgram): bool
    {
        return $user->canManageUsers();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->canManageUsers();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DonationProgram $donationProgram): bool
    {
        return $user->canManageUsers();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DonationProgram $donationProgram): bool
    {
        return $user->isSuperadmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DonationProgram $donationProgram): bool
    {
        return $user->isSuperadmin();
    }

    public function restoreAny(User $user): bool
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DonationProgram $donationProgram): bool
    {
        return $user->isSuperadmin();
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->isSuperadmin();
    }
}
