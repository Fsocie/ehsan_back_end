<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_support'
    ];

    public function setNomSupportAttribute($value)
    {
        $this->attributes['nom_support'] =json_encode($value);
    }
    public function getNomSupportAttribute($value)
    {
        return $this->attributes['nom_support'] =json_decode($value);
    }
}
