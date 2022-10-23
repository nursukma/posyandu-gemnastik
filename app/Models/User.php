<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'user';
    protected $fillable = [
        'user_nama',
        'user_telp',
        'user_keterangan',
        'user_email',
        'role_id',
        'password'
    ];

    protected $dates = ['deleted_at'];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["Super Admin", "Admin", "Visitor"][$value],
        );
    }

    public function visitor()
    {
        return $this->hasOne(DataVisitor::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}