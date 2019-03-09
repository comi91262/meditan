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

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'id');
    }

}
