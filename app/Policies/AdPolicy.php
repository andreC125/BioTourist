<?php

namespace App\Policies;

use App\Models\ { User, Ad };
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Grant all abilities to administrator.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function before(User $user)
    {
        if($user->admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function show(?User $user, Ad $ad)
    {
        if($user && $user->id == $ad->user_id) {
            return true;
        }
        return $ad->active;
    }

    /**
     * Determine whether the user can manage an ad.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function manage(User $user, Ad $ad)
    {
        return $user->id == $ad->user_id;
    }
}
