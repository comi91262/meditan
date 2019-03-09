<?php

namespace App\Repositories\Question;

use Carbon\Carbon;
use App\Models\Question;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $question;

    /**
    * @param object $question
    */
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * 問題を取得する ($section, $number) は主キー
     *
     * @param string $section
     * @param string $number
     * @return Model
     */
    public function retrieveQuestion($section, $number)
    {
        return DB::table('questions')->where(
            [
                'section' => $section,
                'number' => $number,
            ]
        )->first();
    }

    /**
     * 直近で間違った問題を最大20問、ランダムで取得する
     *
     * @return void
     */
    public function retrieveLatestWrongQuestions()
    {
        return DB::table('questions')
            ->where(
                [
                    'success' => false,
                    'user' => Auth::id(),
                ]
            )
            ->whereNotNull('answer_datetime')
            ->latest()
            ->inRandomOrder()
            ->take(10)
            ->pluck('question')
            ->toArray();
    }

    /**
     *　単語の配列から問題を生成するメソッド
     *
     * @param string[] $terms
     * @return string
    */
    public function saveTerms(array $terms)
    {
        $section = Uuid::generate()->string;
        $bulk = [];
        foreach ($terms as $index => $term) {
            $lang = $this->detectLanguage($term);
            $bulk[] = [
                'section' => $section,
                'user' =>  Auth::id(),
                'number' => $index + 1, // 1 origin
                'question' => $term,
                'language' => $lang,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        $this->question->insert($bulk);
        return $section;
    }

    /**
     * 英語か日本語かを識別する
     * UTF-8では、日本語と英語はバイト数が違うことを利用
     *
     * @param string $term
     * @return int
     */
    private function detectLanguage($term)
    {
        if (strlen($term) !== mb_strlen($term)) {
            return Config::get('constants.language.japanese');
        } else {
            return Config::get('constants.language.english');
        }
    }
}
