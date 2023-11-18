<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    // Nama tabel dalam database yang sesuai dengan model
    protected $table = 'arsips';
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