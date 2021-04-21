<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cplprodi extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "cplprodi";
    protected $fillable = [
        'code_id',
        'detail_id',
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
    public function detailprofillulusan()
    {
        return $this->belongsTo(Detailprofillulusan::class, 'code_id');
    }
}
