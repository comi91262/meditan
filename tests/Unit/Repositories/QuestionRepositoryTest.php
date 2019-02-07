<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Repositories\Question\QuestionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->app->make(QuestionRepository::class);
    }

    public function tearDown()
    {
        $this->repository = null;
        parent::tearDown();
    }

    /**
     * TODO
     * A basic test example.
     *
     * @return void
     */
    public function testSaveTerms()
    {
        $this->assertTrue(true);
    }

    // public function saveTerms(array $terms)
    // {
    //     $uuid = Uuid::generate()->string;

    //     $bulk =  [];
    //     foreach ($terms as $index => $term) {
    //         $bulk[] = [
    //             ['section' => $uuid, 'number' => $index, 'question' => $term->name_jp]
    //         ];
    //     }

    //     $this->question->insert($bulk);
    // }
}
