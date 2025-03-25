<?php

namespace App\Filters;

use App\DTOs\Document;

class TotalAmountFilter implements DocumentFilterInterface
{
    public function __construct(protected float $minTotal) {}

    public function apply(Document $document): bool
    {
        return $document->total() > $this->minTotal;
    }
}
