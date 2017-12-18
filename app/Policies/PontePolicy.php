<?php

namespace App\Policies;

use App\User;
use App\Ponte;
use Illuminate\Auth\Access\HandlesAuthorization;

class PontePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ponte.
     *
     * @param  \App\User  $user
     * @param  \App\Ponte  $ponte
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Inspector' || $user->role->nome_role === 'Administrador';

    }

    /**
     * Determine whether the user can create pontes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Inspector' || $user->role->nome_role === 'Administrador';
    }

    /**
     * Determine whether the user can update the ponte.
     *
     * @param  \App\User  $user
     * @param  \App\Ponte  $ponte
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Inspector' || $user->role->nome_role === 'Administrador';

    }

    /**
     * Determine whether the user can delete the ponte.
     *
     * @param  \App\User  $user
     * @param  \App\Ponte  $ponte
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Administrador';

    }

    public function validar(User $user){

        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Administrador';
    }
//
//    public function before($user, $ability)
//    {
//        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Inspector' || $user->role->nome_role === 'Administrador';
//    }
}
