<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin'; // Nama tabel dalam database

    protected $primaryKey = 'admin_id'; // Nama kolom primary key

    protected $fillable = [
        'nama', 
        'username', 
        'password',
        'is_kaprodi',  
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'admin_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}