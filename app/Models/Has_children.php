<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Has_children extends Model
{
    use HasFactory;
    protected $table = "has_childrens";
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'description',
        'photo'
    ];



    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
