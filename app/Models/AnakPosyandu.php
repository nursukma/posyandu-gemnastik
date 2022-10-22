<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnakPosyandu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'anak_posyandu';
    protected $fillable = [
        'berat_kini',
        'lingkar_kepala_kini',
        'tgl_posyandu',
        'riwayat_vitamin',
        'riwayat_imunisasi',
        'tinggi_kini',
        'anak_id'
    ];

    public function anak()
    {
        return $this->belongsTo(DataAnak::class, 'anak_id');
    }
}