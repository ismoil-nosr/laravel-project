<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Post;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $post->author_id == $user->id;
    }

    public function create(User $user)
    {
        // logic that allows/disallows user create a posts
        // ...

        return true;
    }
}
