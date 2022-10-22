<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataVisitor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'visitor';
    protected $fillable = [
        'visitor_nama',
        'visitor_telp',
        'visitor_alamat',
        'visitor_email',
        'user_id'
    ];
    protected $dates = ['deleted_at'];

    public function anak()
    {
        return $this->hasMany(DataAnak::class, 'visitor_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}