<?php

namespace App\Policies;

use App\Models\Turkey;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TurkeyPolicy
{
    use HandlesAuthorization;
     /**
     * Determine whether the user can see the categories.
     */
    public function viewAny(User $user)
    {
        return $user->isTurkey() || $user->isAdmin();
    }    
}
