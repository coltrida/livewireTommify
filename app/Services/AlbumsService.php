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

    public function listaCinqueAlbumPiuVenduti()
    {
        return Album::withCount('userSales')->with('userSales')->limit(5)->get()->sortByDesc(function ($album){
            return $album->userSales()->count();
        });
    }
}
