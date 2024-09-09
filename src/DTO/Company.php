<?php

namespace Jschwendener\Zefix\DTO;

use Jschwendener\Zefix\Enums\CompanyStatus;
use Jschwendener\Zefix\DTO\Address;
use Jschwendener\Zefix\DTO\LegalForm;
use Jschwendener\Zefix\DTO\TranslatedString;
use Saloon\Helpers\ArrayHelpers as Arr;

readonly class Company
{
    public function __construct(
        public string $name,
        public int $ehraid,
        public int $legalSeatId,
        public string $legalSeat,
        public int $registryOfCommerceId,
        public ?string $uid = null,
        public ?string $chid = null,
        public ?LegalForm $legalForm = null,
        public ?CompanyStatus $status = null,
        public ?string $sogcDate = null,
        public ?string $deletionDate = null,
        public ?Address $address = null,
    ) {}

    /**
     * @param array<string, mixed> $data
     */
    public static function fromData(array $data): self
    {
        return new self(
            name: Arr::get($data, 'name'),
            ehraid: Arr::get($data, 'ehraid'),
            uid: Arr::get($data, 'uid'),
            chid: Arr::get($data, 'chid'),
            legalSeatId: Arr::get($data, 'legalSeatId'),
            legalSeat: Arr::get($data, 'legalSeat'),
            registryOfCommerceId: Arr::get($data, 'registryOfCommerceId'),
            legalForm: Arr::get($data, 'legalForm') ? new LegalForm(
                id: Arr::get($data, 'legalForm.id'),
                uid: Arr::get($data, 'legalForm.uid'),
                name: new TranslatedString(
                    de: Arr::get($data, 'legalForm.name.de'),
                    fr: Arr::get($data, 'legalForm.name.fr'),
                    it: Arr::get($data, 'legalForm.name.it'),
                    en: Arr::get($data, 'legalForm.name.en'),
                ),
                shortName: new TranslatedString(
                    de: Arr::get($data, 'legalForm.shortName.de'),
                    fr: Arr::get($data, 'legalForm.shortName.fr'),
                    it: Arr::get($data, 'legalForm.shortName.it'),
                    en: Arr::get($data, 'legalForm.shortName.en'),
                ),
            ) : null,
            status: CompanyStatus::tryFrom(Arr::get($data, 'status')),
            sogcDate: Arr::get($data, 'sogcDate'),
            deletionDate: Arr::get($data, 'deletionDate'),
            address: Arr::get($data, 'address') ? new Address(
                organisation: Arr::get($data, 'address.organisation'),
                careOf: Arr::get($data, 'address.careOf'),
                street: Arr::get($data, 'address.street'),
                houseNumber: Arr::get($data, 'address.houseNumber'),
                addon: Arr::get($data, 'address.addon'),
                poBox: Arr::get($data, 'address.poBox'),
                city: Arr::get($data, 'address.city'),
                swissZipCode: Arr::get($data, 'address.swissZipCode'),
            ) : null,
        );
    }
}
