<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;
    protected $fillable=["name","email","password","gender","permission"];

    public function setPermissionAttribute($permission){
    $this->attributes["permission"]=implode("+",$permission);
    }
    public function getPermissionAttribute($per){
        return explode("+",$per);
    }
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
