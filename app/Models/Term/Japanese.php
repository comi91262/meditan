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

}
