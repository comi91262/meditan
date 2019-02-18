<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Models\Term;
use App\Repositories\Term\TermRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TermRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->app->make(TermRepository::class);
    }

    public function tearDown()
    {
        $this->repository = null;
        parent::tearDown();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRetrieveRandomizedTerms()
    {
        factory(Term::class, 20)->create();
        $terms = $this->repository->retrieveRandomizedTerms(5, '');

        $this->assertCount(5, $terms);
    }
}
