<?php

namespace App\Repositories\Question;

use Carbon\Carbon;
use App\Models\Question;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

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
            ];
        }

        $this->question->insert($bulk);
        return $section;
    }
}
