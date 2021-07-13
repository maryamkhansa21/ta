<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Distribusimatkul extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "distribusimatkul";
    protected $fillable = [
        'smt_id',
        'dtlmatkul_id',
        'jenismatkul_id',
        'sks_id',
        'jam_id',
        'totalsks',
        'totaljam',
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
    public function pembentukanmatkul()
    {
        return $this->belongsTo(Pembentukanmatkul::class, 'smt_id', 'sks_id', 'jam_id');
    }
    public function detailmatkul()
    {
        return $this->belongsTo(Detailmatkul::class, 'dtlmatkul_id');
    }
}
