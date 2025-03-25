<?php

namespace App\Filters;

use App\DTOs\Document;

class DocumentTypeFilter implements DocumentFilterInterface
{
    public function __construct(protected string $type) {}

    public function apply(Document $document): bool
    {
        return $document->documentType === $this->type;
    }
}
