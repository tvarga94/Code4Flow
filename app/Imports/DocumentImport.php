<?php

declare(strict_types = 1);

namespace App\Imports;

use App\DTOs\Document;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DocumentImport implements ToCollection
{
    /**
     * @param Collection $collection
     * @return Document[]
     */
    public function collection(Collection $collection): array
    {
        $headers = $collection->first();
        $documents = [];

        foreach ($collection->skip(1) as $row) {
            $data = [];

            foreach ($headers as $i => $header) {
                $value = json_decode($row[$i]);
                $data[$header] = json_last_error() === JSON_ERROR_NONE ? $value : $row[$i];
            }

            $documents[] = Document::fromArray($data);
        }

        return $documents;
    }
}
