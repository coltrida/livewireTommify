<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isArtist() {
        return $this->role === 'artist';
    }

    public function isUser() {
        return $this->role === 'user';
    }

    public function scopeUtenti($query)
    {
        return $query->where('role', 'user');
    }

    public function scopeArtist($query)
    {
        return $query->where('role', 'artist');
    }

    public function albumSales()
    {
        return $this->belongsToMany(Album::class, 'album_sales', 'user_id', 'album_id');
    }
}
