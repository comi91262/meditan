<?php

namespace App\Repositories\Question;

use Carbon\Carbon;
use App\Models\Question;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
     *　単語の配列から問題を生成するメソッド
     *
     * @param string[] $terms
     * @return string
    */
    public function saveTerms(array $terms, $lang)
    {
        // TODO ユーザー,　単体テストのことを考えて、ファサードをやめる？　
        $section = Uuid::generate()->string;
        $bulk = [];
        foreach ($terms as $index => $term) {
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
}
