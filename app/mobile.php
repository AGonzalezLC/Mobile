<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $fillable = ['number','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
