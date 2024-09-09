<?php

namespace Jschwendener\Zefix\Resources;

use Jschwendener\Zefix\DTO\Company;
use Jschwendener\Zefix\Requests\GetCompanyByUid;
use Jschwendener\Zefix\Requests\SearchCompany;
use Saloon\Http\BaseResource;

class CompanyResource extends BaseResource
{
    /**
     * Search for companies registered in the commercial register by different parameters
     * 
     * @return Company[]
     */
    public function search(string $companyName, array $filters = []): array
    {
        $searchArgs = [
            'name' => $companyName,
            ...$filters
        ];

        return $this->connector->send(new SearchCompany(...$searchArgs))->dtoOrFail();
    }

    /**
     * Get detailed company info by UID
     */
    public function getByUid(string $uid): Company
    {
        $uid = str_replace(['-', '.', ' '], '', trim($uid));

        return $this->connector->send(new GetCompanyByUid($uid))->dtoOrFail();
    }
}
