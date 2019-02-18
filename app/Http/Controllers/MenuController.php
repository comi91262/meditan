<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Question\QuestionServiceInterface;

class MenuController extends Controller
{
    protected $questionService;

    /**
    * @param object $question
    */
    public function __construct(QuestionServiceInterface $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index()
    {
        return view('menu');
    }

    public function exam(Request $request)
    {
        // TODO ない場合とかしっかり買いて
        $genre = $request->input('genre');
        $lang = $request->input('lang');

        $section = $this->questionService->createQuestions($lang, $genre);
        return view('exam', ['section' => $section]);
    }

    public function select()
    {
        $categories = DB::table('terms')->pluck('category');
        $categories = array_unique($categories->toArray());
        return view('select', ['categories' => $categories]);
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
