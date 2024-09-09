<?php

namespace Jschwendener\Zefix\DTO;

readonly class LegalForm
{
    public function __construct(
        public int $id,
        public string $uid,
        public TranslatedString $name,
        public TranslatedString $shortName,
    ) {}
}
