<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $timestamps = false;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'terms';

    public function japaneseTerms()
    {
        return $this->hasMany('App\Models\Term\Japanese');
    }

    public function englishTerms()
    {
        return $this->hasMany('App\Models\Term\English');
    }
}
