<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kajian extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "kajian";
    protected $fillable = [
        'detail_id',
        'bahankajian_id',
        'matkul',
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
    public function detailprofillulusan()
    {
        return $this->belongsToMany(Detailprofillulusan::class, 'detailprofillulusan_kajian');
    }
    public function bahankajian()
    {
        return $this->belongsToMany(Bahankajian::class, 'bahankajian_kajian');
    }
    public function matkul()
    {
        return $this->hasOne(Matkul::class, 'matkul_id', 'id');
    }
    public function detailmatkul()
    {
        return $this->hasOne(Detailmatkul::class, 'matkul_id', 'id');
    }
    
}
