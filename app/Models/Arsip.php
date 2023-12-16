<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Arsip extends Model
{
    use HasFactory;
    protected $table = 'arsips';
    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id',
        'nama',
        'deskripsi',
        'created_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
