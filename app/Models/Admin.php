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
        'title',
        'slug',
        'deskripsi',
        'banner',
        'is_validated',
        'published_at',
    ];
    public function category()
    {
        // Define the relationship to the Category model
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Relasi ke tabel Category
    protected $primaryKey = 'post_id';
    protected $dates = ['published_at'];

    // Add this line to cast published_at to datetime
    protected $casts = [
        'published_at' => 'datetime',
    ];



    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public static function getLatestPosts()
    {
        return self::latest()->paginate(4);
    }
}