<?php

namespace App\Http\Responders\NaiveTree\ClosureTable;

use App\Exceptions\UndefinedStatusException;
use App\Http\Payload;
use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowResponder
{
    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function handle(Payload $payload): Response
    {
        $payloadStatus = $payload->getStatus();

        if ($payload->getStatus() === Payload::UNAUTHORIZED) {
            throw new NotFoundHttpException();
        }

        if ($payloadStatus === Payload::FOUND || $payloadStatus === Payload::FAILED) {
            return $this->responseFactory->view('naive_tree.closure_table.show', $payload->getOutput());
        }

        throw UndefinedStatusException::fromStatus($payload->getStatus());
    }
}
