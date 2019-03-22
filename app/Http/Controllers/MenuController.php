<?php

namespace App\Http\Controllers;

class MenuController extends Controller
{

    /**
    * @param object $question
    */
    public function __construct() {}

    public function index()
    {
        return view('menu');
    }

    public function showAdditionTerm()
    {
        return view('addition_term');
    }
}
