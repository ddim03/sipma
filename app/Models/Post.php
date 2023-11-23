<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Nama tabel dalam database yang sesuai dengan model
    protected $table = 'posts';
    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'category_id',
        'admin_id',
        'judul',
        'slug',
        'gambar',
        'isi',
        'is_validated',
    ];
    // Relasi ke tabel Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Relasi ke tabel Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    // Misalkan ada sebuah method untuk mengambil data terbaru dengan paginate
    public static function getLatestPosts()
    {
        return self::latest()->paginate(4);
    }
}
