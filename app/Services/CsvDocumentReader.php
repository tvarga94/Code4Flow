<?php

declare(strict_types = 1);

namespace App\Services;

use App\DTOs\Document;
use App\Imports\DocumentImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvDocumentReader
{
    public function __construct(
        protected string $path = 'document_list.csv'
    ) {}

    /**
     * @return Document[]
     */
    public function read(): array
    {
        $import = new DocumentImport();

        $rawRows = Excel::toCollection($import, $this->path)->first();

        return $import->collection($rawRows);
    }
}
