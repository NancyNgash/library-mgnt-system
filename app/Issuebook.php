<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Issuebook extends Model
{
    protected $fillable = ['user_id','student_id','status', 'approvalstatus','book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }
  
}
