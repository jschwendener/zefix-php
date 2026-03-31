<?php

namespace Jschwendener\Zefix\DTO;

readonly class MutationType
{
    public function __construct(
        public ?int $id = null,
        public ?string $key = null,
    ) {}

    /**
     * @param array<string, mixed> $data
     */
    public static function fromData(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            key: $data['key'] ?? null,
        );
    }
}
