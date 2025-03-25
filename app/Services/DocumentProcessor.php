<?php

namespace App\Services;

use App\DTOs\Document;
use App\Filters\DocumentFilterInterface;

class DocumentProcessor
{
    /**
     * @param Document[] $documents
     * @param DocumentFilterInterface[] $filters
     * @return Document[]
     */
    public function filter(array $documents, array $filters): array
    {
        return array_filter($documents, function (Document $document) use ($filters) {
            foreach ($filters as $filter) {
                if (!$filter->apply($document)) {
                    return false;
                }
            }
            return true;
        });

    }
}
