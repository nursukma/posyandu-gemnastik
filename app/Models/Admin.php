<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admin';
    protected $fillable = [
        'admin_nama',
        'admin_telp',
        'admin_tempat_lahir',
        'admin_tanggal_lahir',
        'admin_email',
        'admin_tempat_posyandu',
        'posyandu_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}