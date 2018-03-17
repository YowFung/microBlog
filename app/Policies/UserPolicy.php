<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    /**
     * 用户资料更新权限
     *
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function showAndUpdate(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
