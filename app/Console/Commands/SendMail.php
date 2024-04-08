<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendMail as SendMailJob;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-mail
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
            SendMailJob::dispatch()->onQueue('mail');
        }

        return Command::SUCCESS;
    }
}
