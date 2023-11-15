<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin'; // Nama tabel dalam database

    protected $primaryKey = 'admin_id'; // Nama kolom primary key

    protected $fillable = [
        'nama', 
        'username', 
        'password',
        'is_kaprodi',  
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'admin_id');
    }


}