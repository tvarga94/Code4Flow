<?php

namespace App\Filters;

use App\DTOs\Document;

interface DocumentFilterInterface
{
    public function apply(Document $document): bool;
}
