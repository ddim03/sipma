<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // Nama tabel dalam database

    protected $primaryKey = 'category_id'; // Nama kolom primary key

    protected $fillable = [
        'name', // Nama kategori
        'slug', // Slug kategori
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
    
    public $timestamps = true; // Mengaktifkan pengelolaan waktu (created_at dan updated_at)


}