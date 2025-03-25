<?php

namespace App\DTOs;

class Document
{
    public function __construct(
        public string $id,
        public string $documentType,
        public object $partner,
        public array $items
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            documentType: $data['document_type'],
            partner: (object) $data['partner'],
            items: $data['items'] ?? []
        );
    }

    public function total(): float
    {
        return collect($this->items)->reduce(function ($carry, $item) {
            return $carry + ($item->unit_price * $item->quantity);
        }, 0);
    }
}
