<?php

namespace App\Livewire\Admin;

use App\Services\UsersService;
use Livewire\Component;
use Livewire\WithPagination;

class Artists extends Component
{

    use WithPagination;

    public function render(UsersService $usersService)
    {
        return view('livewire.admin.artists', [
            'artists' => $usersService->listaArtists()
        ]);
    }
}
