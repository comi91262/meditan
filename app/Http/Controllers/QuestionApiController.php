<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\Question\QuestionServiceInterface;
use App\Services\Term\TermServiceInterface;

class QuestionApiController extends Controller
{
    /**
    * @var QuestionServiceInterface $questionService
    */
    private $questionService;

    /**
    * @var TermServiceInterface $termService
    */
    private $termService;

    /**
     * @param object $question
     */
    public function __construct(
        QuestionServiceInterface $questionService,
        TermServiceInterface $termService
    ) {
        $this->questionService = $questionService;
        $this->termService = $termService;
    }

    public function index(Request $request)
    {
        return ['questions' => $this->questionService->retrieveAllQuestions($request->user()->id)];
    }

    /**
     * TODO 引数の検証
     * TODO 認証の検証
     *
     * @param  string $section
     * @param  string  $number
     * @return \Illuminate\Http\Response
     */
    public function show($section, $number)
    {
        $question = DB::table('questions')->where(
            [
                'section' => $section,
                'number' => $number,
            ]
        )->first();

        if (null === $question) {
            return response()->json(['message' => 'not found'], 404);
        }

        return ['question' => $question->question];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $section
     * @param  string  $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $section, $number)
    {
        $userAnswer = $request->input('answer');

        list ($isSuccess, $correctAnswers) =  $this->questionService->isCorrect($section, $number, $userAnswer);

        DB::table('questions')
            ->where(['section' => $section, 'number' => $number])
            ->update(
                [
                    'success' => $isSuccess,
                    'user_answer' => $userAnswer,
                    'answer_datetime' => Carbon::now()
                ]
            );

        return ['success' => $isSuccess, 'answer' => implode(', ', $correctAnswers)];
    }

    /**
     * ヒントの取得
     * @param string $section
     * @param string $number
     * @return \Illuminate\Http\Response
     */
    public function showHint($section, $number)
    {
        $question = DB::table('questions')->where(
            [
                'section' => $section,
                'number' => $number,
            ]
        )->first();

        // 別解がある場合は一つのみを選択
        $answers = $this->termService->retrieveCorrectAnswers($question->question, $question->language);
        $hint = mb_substr($answers[0], 0, 1);

        return ['hint' => $hint];
    }

    // TODO メソッド名があいまい
    public function showResult($section)
    {
        return $this->questionService->retrieveSetOfAssociatedSection($section);
    }

    public function showAnsweredCount($section)
    {
        $aggregation = $this->questionService->retrieveSetOfAssociatedSection($section);
        return ['answeredCount' => $aggregation['answered']];
    }

    public function showSection(Request $request)
    {
        return ['section' => $this->questionService->retrieveLatestSection($request->user()->id)];
    }
}
