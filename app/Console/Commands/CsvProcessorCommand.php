<?php

declare(strict_types = 1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CsvDocumentReader;
use App\Services\DocumentProcessor;
use App\Filters\DocumentTypeFilter;
use App\Filters\PartnerIdFilter;
use App\Filters\TotalAmountFilter;

class CsvProcessorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:process {type} {partnerId} {minTotal}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $type = $this->argument('type');
        $partnerId = $this->argument('partnerId');
        $minTotal = (float) $this->argument('minTotal');

        $reader = new CsvDocumentReader();
        $documents = $reader->read();

        $processor = new DocumentProcessor();
        $filtered = $processor->filter($documents, [
            new DocumentTypeFilter($type),
            new PartnerIdFilter($partnerId),
            new TotalAmountFilter($minTotal),
        ]);

        $headers = ['document_id', 'document_type', 'partner name', 'total'];
        foreach ($headers as $h) {
            echo str_pad($h, 20);
        }
        echo PHP_EOL;
        foreach ($headers as $h) {
            echo str_repeat('=', 20);
        }
        echo PHP_EOL;

        foreach ($filtered as $doc) {
            echo str_pad($doc->id, 20);
            echo str_pad($doc->documentType, 20);
            echo str_pad($doc->partner->name ?? 'N/A', 20);
            echo str_pad(number_format($doc->total(), 0, '', ''), 20);
            echo PHP_EOL;
        }
    }
}
