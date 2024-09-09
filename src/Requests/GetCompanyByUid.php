<?php

namespace Jschwendener\Zefix\Requests;

use Jschwendener\Zefix\DTO\Company;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get detailed company info by UID
 */
class GetCompanyByUid extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $uid,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/company/uid/{$this->uid}";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json()[0] ?? null;

        return $data
            ? Company::fromData($data)
            : null;
    }
}
