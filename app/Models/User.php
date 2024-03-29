<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'prenoms',
        'telephone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pays(){
        return $this->belongsTo('App\Models\Pays');
    }
    public function carnet_sante(){
        return $this->belongsTo('App\Models\Carnet_sante','carnet_id');
    }
    public function geolocalisation(){
        return $this->hasMany('App\Models\Geolocalisation');
    }
    public function child(){
        return $this->hasMany('App\Models\HasChild');
    }

    public function contacts(){
        return $this->belongsTo(contacts::class, 'id_user', 'id');
    }

    public function setSupportsAttribute($value)
    {
        $this->attributes['supports'] =json_encode($value);
    }
    public function getSupportsAttribute($value)
    {
        return $this->attributes['supports'] =json_decode($value);
    }

   
}
