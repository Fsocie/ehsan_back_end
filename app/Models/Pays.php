<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    protected $fillable = [
        'indicatif',
        'nom',
        'abr',
        'icone'
    ];
    public $timestamps = true;


    public function user(){
        return $this->hasMany('App\User');
    }
}
