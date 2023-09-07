<?php

namespace App\Livewire;

use App\Services\AlbumsService;
use App\Services\ArtistsService;
use Livewire\Component;

class Home extends Component
{
    public function render(ArtistsService $artistsService, AlbumsService $albumsService)
    {
        return view('livewire.home', [
            'artists' => $artistsService->listaUltimiDieciArtistConAlbums(),
            'albums' => $albumsService->listaCinqueAlbumPiuVenduti()
        ]);
    }
}
