<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet_sante extends Model
{
    use HasFactory;
    protected $fillable = [
        'antecedent',
        'interdiction',
        'poids',
        'taille',
        'description',
        'sexe',
        'groupe',
        'allergie',
        'vaccination',
        'maladie',




  ];


  public function user(){
    return $this->hasMany('App\Models\User');
}

}
