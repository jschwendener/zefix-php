<?php

use Jschwendener\Zefix\DTO\Address;
use Jschwendener\Zefix\DTO\Company;
use Jschwendener\Zefix\DTO\LegalForm;
use Jschwendener\Zefix\DTO\SogcPublication;
use Jschwendener\Zefix\DTO\TranslatedString;
use Jschwendener\Zefix\Enums\CompanyStatus;

it('gets company details by UID', function () {
    $result = zefix()->company()->getByUid('CHE-110.088.994');

    expect($result)
        ->toBeInstanceOf(Company::class)
        ->name->toBe('Microsoft Schweiz GmbH')
        ->ehraid->toBe(710491)
        ->uid->toBe('CHE110088994')
        ->chid->toBe('CH02040270498')
        ->legalSeatId->toBeInt()
        ->legalSeat->toBeString()->not->toBeEmpty()
        ->registryOfCommerceId->toBeInt()
        ->status->toBeInstanceOf(CompanyStatus::class)
        ->canton->toBeString()->toHaveLength(2)
        ->capitalNominal->toBeString()->not->toBeEmpty()
        ->capitalCurrency->toBe('CHF');

    expect($result->legalForm)
        ->toBeInstanceOf(LegalForm::class)
        ->id->toBe(4)
        ->uid->toBe('0107');

    expect($result->legalForm->shortName)
        ->toBeInstanceOf(TranslatedString::class)
        ->de->toBe('GmbH')
        ->fr->toBe('Sàrl')
        ->it->toBe('Sagl')
        ->en->toBe('LLC');

    expect($result->address)
        ->toBeInstanceOf(Address::class)
        ->street->toBeString()->not->toBeEmpty()
        ->city->toBeString()->not->toBeEmpty()
        ->swissZipCode->toBeString()->not->toBeEmpty();

    expect($result->purpose)->toBeString()->not->toBeEmpty();

    expect($result->translation)
        ->toBeArray()
        ->not->toBeEmpty();

    expect($result->sogcPub)->toBeArray()->not->toBeEmpty();
    expect($result->sogcPub[0])
        ->toBeInstanceOf(SogcPublication::class)
        ->sogcDate->toBeString()
        ->sogcId->toBeInt()
        ->registryOfCommerceCanton->toBeString()
        ->message->toBeString()->not->toBeEmpty();

    expect($result->hasTakenOver)->toBeArray()->not->toBeEmpty();
    expect($result->hasTakenOver[0])->toBeInstanceOf(Company::class);

    expect($result->cantonalExcerptWeb)->toBeString()->not->toBeEmpty();

    expect($result->zefixDetailWeb)
        ->toBeInstanceOf(TranslatedString::class)
        ->de->toBeString()->not->toBeEmpty();
});
