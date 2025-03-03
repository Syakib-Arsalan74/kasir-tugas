<?php

namespace App\Policies;

use App\Models\User;

class PenggunaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function aksesPengguna(User $user)
    {
        $user->role == 'admin';
    }
}
