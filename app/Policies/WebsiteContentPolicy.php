<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WebsiteContent;

class WebsiteContentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->canManageUsers();
    }

    public function view(User $user, WebsiteContent $websiteContent): bool
    {
        return $user->canManageUsers();
    }

    public function create(User $user): bool
    {
        return $user->canManageUsers();
    }

    public function update(User $user, WebsiteContent $websiteContent): bool
    {
        return $user->canManageUsers();
    }

    public function delete(User $user, WebsiteContent $websiteContent): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    public function restore(User $user, WebsiteContent $websiteContent): bool
    {
        return false;
    }

    public function restoreAny(User $user): bool
    {
        return false;
    }

    public function forceDelete(User $user, WebsiteContent $websiteContent): bool
    {
        return false;
    }

    public function forceDeleteAny(User $user): bool
    {
        return false;
    }
}
