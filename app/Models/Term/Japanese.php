<?php

namespace App\Models\Term;

use Illuminate\Database\Eloquent\Model;

class Japanese extends Model
{
    public $timestamps = false;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'japanese_terms';

    /**
     *
     */
    public function englishTerms()
    {
        return $this->belongsToMany('App\Models\Term\English', 'terms');
    }

    /**
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
