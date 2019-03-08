<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTerm extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'term_jp', 'term_en', 'department',
    ];

}
