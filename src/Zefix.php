<?php

namespace Jschwendener\Zefix;

use Jschwendener\Zefix\Resources\CompanyResource;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

/**
 * Zefix PublicREST API
 *
 * @see https://www.zefix.admin.ch/ZefixPublicREST/swagger-ui/index.html
 */
class Zefix extends Connector
{
    use AcceptsJson;

    public function __construct(
        protected readonly string $username,
        protected readonly string $password,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://www.zefix.admin.ch/ZefixPublicREST/api/v1';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new BasicAuthenticator($this->username, $this->password);
    }

    public function company(): CompanyResource
    {
        return new CompanyResource($this);
    }
}
