<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Agent  extends Authenticatable
{
    use HasFactory,HasRoles;
    protected $fillable = [
        'nom',
        'prenoms',
        'telephone',
        'email',
        'password',
    ];
}
