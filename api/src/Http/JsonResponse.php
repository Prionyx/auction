<?php

declare(strict_types=1);

namespace App\Http;

use Fig\Http\Message\StatusCodeInterface;
use JsonException;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Response;

class JsonResponse extends Response
{
    /**
     * JsonResponse constructor.
     * @param mixed $data
     * @param int $status
     * @throws JsonException
     */
    public function __construct($data, int $status = StatusCodeInterface::STATUS_OK)
    {
        parent::__construct(
            $status,
            new Headers(['Content-Type' => 'application/json']),
            (new StreamFactory())->createStream(json_encode($data, JSON_THROW_ON_ERROR))
        );
    }
}
