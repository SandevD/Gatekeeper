<?php

namespace App\Policies;

use App\Models\ExitPass;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExitPassPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ExitPass  $exit_pass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ExitPass $exit_pass)
    {
        return $user->hasPermissionTo('view exit pass');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create exit pass');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ExitPass  $exit_pass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ExitPass $exit_pass)
    {
        return $user->hasPermissionTo('edit exit pass');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ExitPass  $exit_pass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ExitPass $exit_pass)
    {
        return $user->hasPermissionTo('delete exit pass');
    }
}
