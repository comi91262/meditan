<?php

namespace App\Http\Controllers;

use App\Services\Term\TermServiceInterface;

class TermApiController extends Controller
{
    /**
     * @var TermServiceInterface $termService
     */
    private $termService;

    /**
     * @param object $question
     */
    public function __construct(
        TermServiceInterface $termService
    ) {
        $this->termService = $termService;
    }

    /**
     * @param  string|int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ['terms' => $this->termService->retrieveTermsByDepartment($id)];
    }

}
