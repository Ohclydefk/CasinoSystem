<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Member;

class MemberPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole('admin') || $user->hasPermission('view_members');
    }

    public function view(User $user, Member $member)
    {
        return $user->hasRole('admin') || $user->id === $member->id;
    }

    public function create(User $user)
    {
        return $user->hasRole('admin') || $user->hasPermission('create_member');
    }

    public function update(User $user, Member $member)
    {
        return $user->hasRole('admin') || $user->id === $member->id;
    }

    public function delete(User $user, Member $member)
    {
        return $user->hasRole('admin');
    }
}
