<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

use Auth;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return false;
        }
    }
    */

    public function update(User $user, Post $post)
    {
        return ($user->id === $post->user_id);
    }

    public function delete(User $user, Post $post)
    {
        return ($user->id === $post->user_id);
    }


}
