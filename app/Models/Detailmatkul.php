<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Detailmatkul extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "detailmatkul";
    protected $fillable = [
        'matkul_id',
        'dtlmatkul',
    ];

    public function kajian()
    {
        return $this->belongsTo(Kajian::class, 'matkul_id');
    }
    public function pembentukanmatkul()
    {
        return $this->hasMany(Pembentukanmatkul::class, 'dtlmatkul_id', 'id');
    }
    public function distribusimatkul()
    {
        return $this->hasMany(Distribusimatkul::class, 'dtlmatkul_id', 'id');
    }
}
