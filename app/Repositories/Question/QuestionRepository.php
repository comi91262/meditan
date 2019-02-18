<?php

namespace App\Repositories\Question;

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
    * @param string $lang 問題文の言語　
    * @return string
    */
    public function saveTerms($terms, $lang)
    {
        // TODO ユーザー,　単体テストのことを考えて、ファサードをやめる？　
        $section = Uuid::generate()->string;

        $bulk = [];
        foreach ($terms as $index => $term) {
            switch ($lang) {
                case 'en':
                    $bulk[] = [
                        'section' => $section,
                        'user' =>  Auth::id(),
                        'number' => $index,
                        'question' => $term->name_en,
                        'answer' => $term->name_jp
                    ];
                    break;
                case 'jp':
                    $bulk[] = [
                        'section' => $section,
                        'user' =>  Auth::id(),
                        'number' => $index,
                        'question' => $term->name_jp,
                        'answer' => $term->name_en
                    ];
                    break;
                default:
                    break;
            }
        }

        $this->question->insert($bulk);
        return $section;
    }
}
