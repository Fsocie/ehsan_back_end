<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_cas extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'commentaire',
    ];


    public function User(){
        return $this->belongsTo('App\User');
    }
    public function geolocalisation(){
        return $this->hasMany('App\Geolocalisation');
    }


}
