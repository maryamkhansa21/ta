<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Detailprofillulusan extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "detailprofillulusan";
    protected $fillable = [
        'code',
        'detail',
        'profil_id',
        'unsur',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [
    //'password',
    //'remember_token',
    //];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    //protected $casts = [
    //'email_verified_at' => 'datetime',
    //];
    public function profillulusan()
    {
        return $this->belongsTo(Profillulusan::class, 'profil_id');
    }
    public function cplprodi()
    {
        return $this->hasOne(Cplprodi::class);
    }
    public function kajian()
    {
        return $this->hasMany(Kajian::class, 'detailprofillulusan_kajian');
    }
    public function kesepadananku()
    {
        return $this->hasMany(Kesepadananku::class, 'detailprofillulusan_kesepadanan');
    }
}
