<?php

namespace App\Services;

use App\Models\Song;

class SongsService
{
    public function listaSongsConAlbum()
    {
        return Song::with('album')->latest()->paginate(5);
    }
}
