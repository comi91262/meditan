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
    * @param Term[] $terms
    * @return string
    */
    public function saveTerms($terms, $lang)
    {
        // TODO ユーザー,　単体テストのことを考えて、ファサードをやめる？　
        $section = Uuid::generate()->string;

        if ($lang === 'jp') {
            $lang = 0;
        } elseif ($lang === 'en') {
            $lang = 1;
        }

        $bulk = [];
        foreach ($terms as $index => $term) {
            $bulk[] = [
                'section' => $section,
                'iuser' =>  Auth::id(),
                'number' => $index + 1, // 1 origin
                'question' => $term->term,
                'language' => $lang,
                'created_at' => Carbon::now(),
            ];
        }

        $this->question->insert($bulk);
        return $section;
    }
}
