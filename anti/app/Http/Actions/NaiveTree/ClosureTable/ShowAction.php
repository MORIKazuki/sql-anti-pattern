<?php

namespace App\Http\Actions\NaiveTree\ClosureTable;

use App\Http\Controllers\Controller;
use App\Http\Responders\NaiveTree\ClosureTable\ShowResponder;
use App\Usecase\NaiveTree\ClosureTable\ShowUsecase;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowAction extends Controller
{
    private ShowUsecase $usecase;

    private ShowResponder $responder;

    public function __construct(ShowUsecase $usecase, ShowResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    public function __invoke(Request $request): Response
    {
        return $this->responder->handle($this->usecase->run());
    }
}
