<?php

namespace Jschwendener\Zefix\DTO;

readonly class CompanyOldName
{
    /**
     * @param string[] $translation
     */
    public function __construct(
        public ?string $name = null,
        public ?int $sequenceNr = null,
        public array $translation = [],
    ) {}

    /**
     * @param array<string, mixed> $data
     */
    public static function fromData(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            sequenceNr: $data['sequenceNr'] ?? null,
            translation: $data['translation'] ?? [],
        );
    }
}
