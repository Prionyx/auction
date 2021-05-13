<?php

namespace App\Http\Action;

use App\Http\Http;
use JsonException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use stdClass;

class HomeAction
{
    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws JsonException
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return Http::json($response, new stdClass());
    }
}
