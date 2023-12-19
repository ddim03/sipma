<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Arsip extends Model
{
    use HasFactory;
    protected $table = 'arsips';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
