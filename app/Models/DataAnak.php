<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataAnak extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'anak';
    protected $fillable = [
        'no_aktaLahir',
        'anak_nama',
        'anak_lingkar_kepala',
        'anak_berat_lahir',
        'anak_tgl_lahir',
        'anak_tinggi_lahir',
        'visitor_id'
    ];
    protected $dates = ['deleted_at'];

    public function visitor()
    {
        return $this->belongsTo(DataVisitor::class, 'visitor_id', 'id');
    }

    public function kunjungan()
    {
        return $this->hasMany(AnakPosyandu::class, 'anak_id', 'id');
    }
}