<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
   protected $fillable = ['content', 'user_id','rate','category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
