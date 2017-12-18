<?php

namespace App\Policies;

use App\User;
use App\Inspecao;
use Illuminate\Auth\Access\HandlesAuthorization;

class InspecaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the inspecao.
     *
     * @param  \App\User  $user
     * @param  \App\Inspecao  $inspecao
     * @return mixed
     */
    public function view(User $user, Inspecao $inspecao)
    {
        return $user->id == $inspecao->user_id;
    }

    /**
     * Determine whether the user can create inspecaos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the inspecao.
     *
     * @param  \App\User  $user
     * @param  \App\Inspecao  $inspecao
     * @return mixed
     */
    public function update(User $user, Inspecao $inspecao)
    {
        //
    }

    /**
     * Determine whether the user can delete the inspecao.
     *
     * @param  \App\User  $user
     * @param  \App\Inspecao  $inspecao
     * @return mixed
     */
    public function delete(User $user, Inspecao $inspecao)
    {
        //
    }

    public function agendar(User $user) {

        return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Administrador';

    }
}
