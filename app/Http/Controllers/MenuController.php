<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $name = DB::select('select * from users');

        return view('menu', ['name' => 'あああ']);
    }
}
