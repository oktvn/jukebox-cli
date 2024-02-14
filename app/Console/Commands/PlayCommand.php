<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Track;
use Illuminate\Support\Facades\Cache;


class PlayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play {tracks* : The track IDs}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Play the track identified by the corresponding number. If there is a track already playing, it will be added to the queue.
    It can also take a list of numbers and add those to the queue';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $queue = Cache::get('track_queue', []);
        $trackIds = $this->argument('tracks');

        foreach ($trackIds as $trackId) {
            $track = Track::find($trackId);

            if (!$track) {
                $this->info("Track ID $trackId does not exist.");
                continue;
            } else {
                $artistId = $track->artist_id;
                $trackInfo = "Track ID $trackId: '{$track->artist->name} - {$track->name}' - ";
            }

            $queue[$artistId][] = $trackId;

            $this->info("$trackInfo Added to queue");
        }

        //print_r($queue);

        Cache::put('track_queue', $queue);


    }

}
