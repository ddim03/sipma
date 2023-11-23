<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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
