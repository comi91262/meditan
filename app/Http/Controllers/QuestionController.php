<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Question\QuestionServiceInterface;

class QuestionController extends Controller
{
    /**
    * @var QuestionServiceInterface $question
    */
    private $service;

    /**
    * @param object $question
    */
    public function __construct(QuestionServiceInterface $questionService)
    {
        $this->service = $questionService;
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
        $question = DB::table('questions')->where(
            [
                'section' => $section,
                'number' => $number,
            ]
        )->first();

        if ($question->answer === $userAnswer) {
            DB::table('questions')
            ->where(['section' => $section, 'number' => $number])
            ->update(['success' => true]);
            // TOOD 結果の種類を増やす
            return [ 'success' => true ];
        }

        return [ 'success' => false ];
    }

    /**
     * デバッグ用。あとで廃止
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = $this->service->createQuestions();

        return ['section' => $section];
    }
}
