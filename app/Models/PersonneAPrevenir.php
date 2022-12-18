<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonneAPrevenir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_personne1','prenom_personne1','telephone_personne1',
        'nom_personne2','prenom_personne2','telephone_personne2',
        'nom_personne3','prenom_personne3','telephone_personne3'
    ];
}
