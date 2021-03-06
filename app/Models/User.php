<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;

class User extends Model implements Authenticatable
{
    use AuthAuthenticatable;
    use HasFactory;
    protected $fillable = [
        'role_id',
        "email",
        "nom",
        "prenom",
        "date_naissance",
        "password",
        "module_id",
        'token',
        'tel'
    ];


    public function role(){
        return $this->belongsTo(Role::class);
    }
}
