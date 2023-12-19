<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
