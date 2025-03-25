<?php

declare(strict_types = 1);

namespace App\Filters;

use App\DTOs\Document;

class PartnerIdFilter implements DocumentFilterInterface
{
    public function __construct(protected string $partnerId) {}

    public function apply(Document $document): bool
    {
        return $document->partner->id == $this->partnerId;
    }
}
