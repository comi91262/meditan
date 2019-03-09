<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;

    /**
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
