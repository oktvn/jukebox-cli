<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;


class ClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the queue and current playing track';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Cache::forget('track_queue');
        $this->info("Queue cleared.");
    }
}
