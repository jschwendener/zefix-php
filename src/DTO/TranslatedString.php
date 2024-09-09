<?php 

namespace Jschwendener\Zefix\DTO;

readonly class TranslatedString
{
    public function __construct(
        public string $de,
        public string $fr,
        public string $it,
        public string $en,
    ) {}
}