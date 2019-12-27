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

    public function userDiets()
    {
            return $this->hasMany('App\Diets', 'userid');
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
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'roles_has_users', 'user_id', 'role_id')->withTimestamps();
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

}
