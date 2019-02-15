<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\Question;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\Question\QuestionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShow()
    {
        factory(User::class)->create();
        $question = factory(Question::class)->create();

        $response = $this->get("/api/questions/".$question->section."/".$question->number);
        // $response = $this->get("/api/questions/1/1");
        $response->assertStatus(200)
                ->assertExactJson(['question' => $question->question])
        ;
    }
}
