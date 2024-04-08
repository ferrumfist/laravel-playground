<?php

namespace App\Console\Commands;

use App\Jobs\DoCalc as DoCalcJob;
use Illuminate\Console\Command;

class DoCalc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do-calc
    {--count=10 : Count of mail}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->option('count');

        if (!ctype_digit($count)) {
            $this->error('Count must be an integer.');
            return Command::INVALID;
        }

        while ($count--) {
            DoCalcJob::dispatch()->onQueue('calc');
        }

        return Command::SUCCESS;
    }
}
