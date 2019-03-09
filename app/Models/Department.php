<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;

    /**
     */
    public function japaneseTerms()
    {
        return $this->hasMany('App\Models\Term\Japanese');
    }

    /**
     */
    public function englishTerms()
    {
        return $this->hasMany('App\Models\Term\English');
    }

    public function userTerms()
    {
        return $this->hasMany('App\Models\UserTerm');
    }
}
