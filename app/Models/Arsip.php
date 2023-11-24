<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Arsip extends Model
{
    use HasFactory;
    // Nama tabel dalam database yang sesuai dengan model
    protected $table = 'arsips';

    protected $primaryKey = 'id'; // Nama kolom primary key

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'admin_id',
        'nama',
        'deskripsi',
        'created_at',
    ];
    // Relasi ke tabel Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
