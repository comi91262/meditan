<?php

namespace App\Repositories\Question;

use App\Models\Question;
use Webpatser\Uuid\Uuid;

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

    public function saveTerms($terms)
    {
        $section = Uuid::generate()->string;

        $bulk = [];
        foreach ($terms as $index => $term) {
            $bulk[] = ['section' => $section, 'number' => $index, 'question' => $term->name_jp];
        }

        $this->question->insert($bulk);

        return $section;
    }
}
