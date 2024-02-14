<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Track;
use Illuminate\Support\Facades\Cache;


class QueueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List contents of the queue including currently playing track';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $queue = Cache::get('track_queue', []);

        if (!empty($queue)) {
            $this->info('Queue:');
            foreach ($queue as $artistId => $trackIds) {
                // echo "Artist ID: $artistId";
                foreach ($trackIds as $trackId) {
                    $track = Track::find($trackId);
                    $this->info("Track ID $trackId: '{$track->artist->name} - {$track->name}'");
                }
            }
        } else {
            $this->info("Queue is empty");
        }
    }
}
