<?php

namespace App\Policies;

use App\Models\Dubai;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DubaiPolicy
{
    use HandlesAuthorization;
    
     /**
     * Determine whether the user can see the categories.
     */
    public function viewAny(User $user)
    {
        return $user->isDubai() || $user->isAdmin();
    }    
}
