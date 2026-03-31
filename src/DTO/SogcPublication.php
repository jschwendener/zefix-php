<?php

namespace Jschwendener\Zefix\DTO;

readonly class SogcPublication
{
    /**
     * @param MutationType[] $mutationTypes
     */
    public function __construct(
        public ?string $sogcDate = null,
        public ?int $sogcId = null,
        public ?int $registryOfCommerceId = null,
        public ?string $registryOfCommerceCanton = null,
        public ?int $registryOfCommerceJournalId = null,
        public ?string $registryOfCommerceJournalDate = null,
        public ?string $message = null,
        public array $mutationTypes = [],
    ) {}

    /**
     * @param array<string, mixed> $data
     */
    public static function fromData(array $data): self
    {
        return new self(
            sogcDate: $data['sogcDate'] ?? null,
            sogcId: $data['sogcId'] ?? null,
            registryOfCommerceId: $data['registryOfCommerceId'] ?? null,
            registryOfCommerceCanton: $data['registryOfCommerceCanton'] ?? null,
            registryOfCommerceJournalId: $data['registryOfCommerceJournalId'] ?? null,
            registryOfCommerceJournalDate: $data['registryOfCommerceJournalDate'] ?? null,
            message: $data['message'] ?? null,
            mutationTypes: array_map(
                fn (array $mt) => MutationType::fromData($mt),
                $data['mutationTypes'] ?? [],
            ),
        );
    }
}
