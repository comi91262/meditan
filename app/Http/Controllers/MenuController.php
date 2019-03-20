<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\Term\TermServiceInterface;
use App\Services\Question\QuestionServiceInterface;
use App\Repositories\Department\DepartmentRepositoryInterface;

class MenuController extends Controller
{
    protected $questionService;
    protected $termService;
    protected $departmentRepository;

    /**
    * @param object $question
    */
    public function __construct(
        QuestionServiceInterface $questionService,
        TermServiceInterface $termService,
        DepartmentRepositoryInterface $departmentRepository
    ) {
        $this->questionService = $questionService;
        $this->termService =  $termService;
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        return view('menu');
    }

    public function select()
    {
        $departments = $this->departmentRepository->retrieveAllDepartments();
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

        $section = $this->questionService->retrieveLatestSection(Auth::id());
        if ($section === '') {
            $section = $this->questionService->createQuestions($lang, $departments, $number);
        }
        return view('exam', ['section' => $section]);
    }

    public function selectCondition()
    {
        return view('select_condition');
    }

    public function examCondition(Request $request)
    {
        $this->validateSelector2($request);

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

        $section = $this->questionService->retrieveLatestSection(Auth::id());
        if ($section === '') {
            $section = $this->questionService->createConditionQuestions($number);
        }
        return view('exam', ['section' => $section]);
    }

    public function selectRetry()
    {
        return view('select_retry');
    }

    /**
     *
     */
    public function validateSelector2($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'number' => 'required',
            ],
            [
                'required' => ':attribute が必要です.',
            ]
        )->validate();
    }

    public function examRetry(Request $request)
    {
        $section = $this->questionService->retrieveLatestSection(Auth::id());
        if ($section === '') {
            $section = $this->questionService->createRetryQuestions();
        }
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

    public function showAdditionTerm()
    {
        return view('addition_term');
    }
}
