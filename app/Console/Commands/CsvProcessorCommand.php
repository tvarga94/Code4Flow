<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $this->info('It works!');
    }
}
