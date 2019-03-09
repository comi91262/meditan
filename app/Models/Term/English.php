<?php

namespace App\Models\Term;

use Illuminate\Database\Eloquent\Model;

class English extends Model
{
    public $timestamps = false;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'english_terms';

    /**
     *
     */
    public function japaneseTerms()
    {
        return $this->belongsToMany('App\Models\Term\Japanese', 'term');
    }

    /**
     *
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
