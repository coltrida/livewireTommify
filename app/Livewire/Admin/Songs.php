<?php

namespace App\Livewire\Admin;

use App\Services\SongsService;
use Livewire\Component;
use Livewire\WithPagination;

class Songs extends Component
{

    use WithPagination;

    public function render(SongsService $songsService)
    {
        return view('livewire.admin.songs', [
            'songs' => $songsService->listaSongsConAlbum()
        ]);
    }
}
