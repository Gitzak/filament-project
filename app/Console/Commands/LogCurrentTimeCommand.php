<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LogCurrentTimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:log-current-time-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logs the current time to a log file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = now();

        Log::info('Current Time: ' . $currentTime);

        $logFile = storage_path('logs/time.log');
        file_put_contents($logFile, "Current Time: $currentTime" . PHP_EOL, FILE_APPEND);

        $this->info('Logged current time successfully.');
    }
}
