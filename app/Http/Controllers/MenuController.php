<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

    public function select()
    {
        $departments = DB::table('terms')->pluck('department');
        $departments = array_unique($departments->toArray());
        return view('select', ['departments' => $departments]);
    }

    public function exam(Request $request)
    {
        $this->validateSelector($request);

        $departments = $request->input('departments');
        $lang = $request->input('lang');
        $number = $request->input('number');

        switch ($number) {
            case 'ten':
                $number = 10;
                break;
            case 'twenty':
                $number = 20;
                break;
            case 'all':
                $number = 1000;
                break;
            default:
                // TODO 別で対応
                break;
        }

        $section = $this->questionService->createQuestions($lang, $departments, $number);
        return view('exam', ['section' => $section]);
    }

    /**
     *
     */
    public function validateSelector($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'departments' => 'required',
                'lang' => 'required',
                'number' => 'required',
            ],
            [
                'required' => ':attribute が必要です.',
            ]
        )->validate();
    }

    public function history()
    {
        $questions = DB::table('questions')
            ->select()
            ->where('user', Auth::id())
            ->whereNotNull('answer_datetime')
            ->get();
        return view('history', ['questions' => $questions]);
    }

    public function list()
    {
        $terms = DB::table('terms')->get();
        return view('list', ['terms' => $terms]);
    }
}
