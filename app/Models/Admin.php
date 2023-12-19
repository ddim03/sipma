<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Autenticatable;


class Admin extends Autenticatable
{
    protected $table = 'admins'; // Nama tabel dalam database

    protected $primaryKey = 'id'; // Nama kolom primary key

    protected $fillable = [
        'nama',
        'username',
        'password',
        'is_kaprodi',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
