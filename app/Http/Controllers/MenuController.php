<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu');
    }

    public function exam()
    {
        return view('exam');
    }

    public function history()
    {
        return view('history');
    }

    public function list()
    {
        $terms = DB::table('terms')->get();
        return view('list', ['terms' => $terms]);
    }
}
