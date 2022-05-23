<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';
    protected $fillable = ['name', 'email', 'phone', 'address', 'gender', 'class'];

    public function issues()
    {
        return $this->hasMany(IssueBook::class);
    }
}
