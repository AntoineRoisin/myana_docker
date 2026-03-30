<?php

namespace App\Policies;

use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ShortUrlPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ShortUrl $shortUrl): Response
    {
        return $user->id === $shortUrl->user_id
            ? Response::allow()
            : Response::deny('You do not own this shortUrl');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ShortUrl $shortUrl): Response
    {
        return $user->id === $shortUrl->user_id
            ? Response::allow()
            : Response::deny('You do not own this shortUrl');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ShortUrl $shortUrl): Response
    {
        return $user->id === $shortUrl->user_id
            ? Response::allow()
            : Response::deny('You do not own this shortUrl');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ShortUrl $shortUrl): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ShortUrl $shortUrl): bool
    {
        return false;
    }
}
