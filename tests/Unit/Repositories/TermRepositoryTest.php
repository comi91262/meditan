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

    /**
     *  Setup
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->app->make(TermRepository::class);
    }

    /**
     * TearDown
     *
     * @return void
     */
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
        factory(Term::class, 1)->create();

        $terms = $this->repository->retrieveRandomizedTerms(['放射線科'], 1, 'en');

        $this->assertCount(1, $terms);
    }

}