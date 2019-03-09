<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // これを指定しないと、pgsql 実行時、セッション操作で型が合わずエラーになる
    public $incrementing = false;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * ブログポストのコメントを取得
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    /**
     * ブログポストのコメントを取得
     */
    public function userTerms()
    {
        return $this->hasMany('App\Models\UserTerms');
    }
}
