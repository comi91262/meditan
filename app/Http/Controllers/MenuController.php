<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $department = $request->input('department');
        $lang = $request->input('lang');

        $section = $this->questionService->createQuestions($lang, $department);
        return view('exam', ['section' => $section]);
    }

    public function select()
    {
        $categories = DB::table('terms')->pluck('department');
        $categories = array_unique($categories->toArray());
        return view('select', ['departments' => $categories]);
    }

    public function history()
    {
        $questions = DB::table('questions')->select()->where('user', Auth::id())->get();
        return view('history', ['questions' => $questions]);
    }

    public function list()
    {
        $terms = DB::table('terms')->get();
        return view('list', ['terms' => $terms]);
    }
}
