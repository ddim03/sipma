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
        // 'category_id',
        // 'admin_id',
        'title',
        'slug',
<<<<<<< HEAD
        'banner',
        'deskripsi',
        'is_validated',
        // 'published_at',
=======
        'gambar',
        'isi',
        'is_validated',
>>>>>>> 3389e389f11f1937b2425f3d1e42a45a0e8edb4e
    ];

    // Relasi ke tabel Category
    protected $primaryKey = 'post_id';
    protected $dates = ['published_at'];

    // Add this line to cast published_at to datetime
    protected $casts = [
        'published_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public static function getLatestPosts()
    {
        return self::latest()->paginate(4);
    }
}
