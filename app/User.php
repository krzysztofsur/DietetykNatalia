<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
       
    use  Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function measurement()
    {
            return $this->hasOne('App\Measurement', 'userid');
    } 

    public function personaldata()
    {
            return $this->hasOne('App\PersonalData', 'userid');
    } 

    public function allergies()
    {
            return $this->hasOne('App\Allergies', 'userid');
    } 

    public function illness()
    {
            return $this->hasOne('App\Illness', 'userid');
    }

    public function diary()
    {
            return $this->hasMany('App\Diary', 'userid');
    } 
}
