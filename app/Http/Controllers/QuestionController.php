<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        // TODO とりあえずこれ以上出題はないと解釈する
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
        $question = DB::table('questions')->where(
            [
                'section' => $section,
                'number' => $number,
            ]
        )->first();

        if ($question->answer === $userAnswer) {
            DB::table('questions')
            ->where(['section' => $section, 'number' => $number ])
            ->update(['success' => true, 'user_answer' => $userAnswer, 'answer_datetime' => Carbon::now()]);
            // TOOD 結果の種類を増やす
            return [ 'success' => true ];
        } else {
            DB::table('questions')
            ->where(['section' => $section, 'number' => $number ])
            ->update(['success' => false, 'user_answer' => $userAnswer, 'answer_datetime' => Carbon::now()]);

            return [ 'success' => false, 'answer' => $question->answer ];
        }
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

        $hint = mb_substr($question->answer, 0, 1);
        return ['hint' => $hint];
    }
}
