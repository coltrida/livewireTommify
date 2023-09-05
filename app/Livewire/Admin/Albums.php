<?php

namespace App\Livewire\Admin;

use App\Services\AlbumsService;
use Livewire\Component;
use Livewire\WithPagination;

class Albums extends Component
{

    use WithPagination;

    public function render(AlbumsService $albumsService)
    {
        return view('livewire.admin.albums', [
            'albums' => $albumsService->listaAlbumConArtist()
        ]);
    }
}
