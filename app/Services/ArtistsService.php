<?php

namespace App\Services;

use App\Models\Artist;

class ArtistsService
{
    public function listaUltimiDieciArtistConAlbums()
    {
        return Artist::with('albums', 'user')->latest()->limit(10)->get();
    }
}
