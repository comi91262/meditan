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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $section, $number)
    {
        $question = DB::table('questions')->where(
            [
                'section' => $section,
                'number' => $number,
            ]
        )->first();

        return ['isSuccess' => true];
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
