<?php

namespace App\Policies;

use App\Models\Vanuatu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VanuatuPolicy
{
    use HandlesAuthorization;
     /**
     * Determine whether the user can see the categories.
     */
    public function viewAny(User $user)
    {
        return $user->isVanuatu() || $user->isAdmin();
    }    
}
