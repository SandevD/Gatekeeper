<?php

namespace App\Policies;

use App\Models\Overtime;
use App\Models\User;

class OvertimePolicy
{
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Overtime $overtime)
    {
        return $user->hasPermissionTo('view overtime');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create overtime');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Overtime $overtime)
    {
        return $user->hasPermissionTo('edit overtime');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Overtime $overtime)
    {
        return $user->hasPermissionTo('delete overtime');
    }
}
