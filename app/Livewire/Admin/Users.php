<?php

namespace App\Livewire\Admin;

use App\Services\UsersService;
use Livewire\WithPagination;
use Livewire\Component;

class Users extends Component
{

    use WithPagination;

    public function render(UsersService $usersService)
    {
        return view('livewire.admin.users', [
            'users' => $usersService->listaUsers()
        ]);
    }
}
