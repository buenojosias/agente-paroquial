<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;

class GroupPolicy
{
    public function __construct() {
        //
    }

    public function create(User $user)
    {
        return $user->hasRole('pascom');
    }

    public function edit(User $user, Group $group)
    {
        if ($user->hasRole('pascom')) {
            return true;
        }

        return ($user->hasRole('coordinator') && $group->leaders->contains($user));
    }

    public function manage(User $user, Group $group)
    {
        if ($user->hasRole('pascom')) {
            return true;
        }

        return ($user->hasRole('coordinator') && $group->leaders->contains($user));
    }
}
