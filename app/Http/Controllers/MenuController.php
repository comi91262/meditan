<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $terms = DB::table('terms')->get();

        return view('menu', ['terms' => $terms]);
    }
}
