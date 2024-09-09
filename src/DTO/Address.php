<?php

namespace Jschwendener\Zefix\DTO;

readonly class Address
{
    public function __construct(
        public ?string $organisation = null,
        public ?string $careOf = null,
        public ?string $street = null,
        public ?string $houseNumber = null,
        public ?string $addon = null,
        public ?string $poBox = null,
        public ?string $city = null,
        public ?string $swissZipCode = null,
    ) {}
}
