<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        "nom",
        "prenom",
        "date_naissance",
        "mdp",
        "module"
    ];


    public function role(){
        return $this->belongsTo(Role::class);
    }
}
