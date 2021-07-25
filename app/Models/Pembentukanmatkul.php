<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pembentukanmatkul extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "pembentukanmatkul";
    protected $fillable = [
        'tk',
        'totaltk',
        'alltotaltk',
        'besarsks',
        'pembulatansks',
        'psikomotorik',
        'jenismatkul',
        'jam',
        'smt',
        'dtlmatkul_id',
        'bahankajian_id'

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
    public function detailmatkul()
    {
        return $this->belongsTo(Detailmatkul::class, 'dtlmatkul_id', 'id');
    }
    public function bahankajian()
    {
        return $this->belongsToMany(Bahankajian::class, 'bahankajian_kajian');
    }
    public function distribusimatkul()
    {
        return $this->hasMany(Distribusimatkul::class);
    }
    public function pembentukanmatkul()
    {
        return $this->belongsToMany(Pembentukanmatkul::class, 'tk_pembentukanmatkul');
    }
    public function kajian()
    {
        return $this->belongsToMany(Kajian::class, 'bahankajian_id');
    }
}
