<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Geolocalisation extends Model
{

    use HasFactory;
    protected $fillable = [
        'libelle',
        'ip_adresse',
        'pays',
        'zone',
        'longitude',
        'type',
        'latitude',
  ];
    public function user(){
        return $this->belongsTo('App\Models\User');
        }

    public function cas(){
        return $this->belongsTo('App\Models\Type_cas');
    }

}
