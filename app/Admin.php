<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public function setPasswordAttribute($password){
    	$this->attributes['password']= bcrypt($password);
    }
}
