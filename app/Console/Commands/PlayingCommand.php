<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Track;
use Illuminate\Support\Facades\Cache;

class PlayingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'playing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Details of the currently playing track';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $queue = Cache::get('track_queue', []);

        if (empty($queue)) {
            $this->error("No track is currently playing.");
            return;
        }

        $currentTrack = Track::find(reset($queue)[0]);


        $this->info("Currently playing:");
        $this->line("Track ID {$currentTrack->id}: '{$currentTrack->artist->name} - {$currentTrack->name}'");
    }
}
