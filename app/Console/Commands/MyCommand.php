<?php

namespace App\Console\Commands;

use App\Jobs\ProcessPodcast;
use Illuminate\Console\Command;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-command
    {--count=10 : Count of jobs}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for test execution';

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
            ProcessPodcast::dispatch();
        }

        return Command::SUCCESS;
    }
}
