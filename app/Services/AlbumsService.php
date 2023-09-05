<?php

namespace App\Services;


use App\Models\Album;

class AlbumsService
{
    public function listaAlbumConArtist()
    {
        return Album::with(['artist' => function($a){
            $a->with('user');
        }])->latest()->paginate(5);
    }
}
