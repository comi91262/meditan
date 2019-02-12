<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $terms = DB::table('terms')->get();

        return view('menu', ['terms' => $terms]);
    }

    public function exam()
    {
        return view('exam');
    }
}
