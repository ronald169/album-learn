<?php

namespace App\Policies;

use App\Models\{Album, User};

class AlbumPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user, Album $album): bool
    {
        return $user->id === $album->user_id;
    }
}
