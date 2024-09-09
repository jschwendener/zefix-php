<?php

namespace Jschwendener\Zefix\Requests;

use Jschwendener\Zefix\DTO\Company;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Search for companies registered in the commercial register by different parameters
 */
class SearchCompany extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private string $name,
        private ?int $legalFormId = null,
        private ?string $legalFormUid = null,
        private ?int $registryOfCommerceId = null,
        private ?int $legalSeatId = null,
        private ?string $canton = null,
        private bool $activeOnly = true,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/company/search';
    }

    /**
     * @return array<string, mixed> 
     */
    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'legalFormId' => $this->legalFormId,
            'legalFormUid' => $this->legalFormUid,
            'registryOfCommerceId' => $this->registryOfCommerceId,
            'legalSeatId' => $this->legalSeatId,
            'canton' => $this->canton,
            'activeOnly' => $this->activeOnly,
        ];
    }

    /**
     * @return Company[]|null
     */
    public function createDtoFromResponse(Response $response): ?array
    {
        return $response->json()
            ? array_map(fn (array $data) => Company::fromData($data), $response->json())
            : null;
    }
}
