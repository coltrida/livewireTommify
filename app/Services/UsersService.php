<?php

namespace App\Services;

use App\Models\User;

class UsersService
{
    public function listaUsers()
    {
        return User::utenti()->latest()->paginate(5);
    }

    public function listaArtists()
    {
        return User::artist()->latest()->paginate(5);
    }
}
