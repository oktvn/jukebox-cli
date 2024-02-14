<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Track;
use App\Models\Artist;


class ListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all artists and tracks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->listByTrack();
        $this->listByArtist();
    }

    private function listByTrack()
    {
        $tracks = Track::with('artist')->get();

        $this->info('Tracks:');
        foreach ($tracks as $index => $track) {
            $artistName = $track->artist ? $track->artist->name : 'Unknown Artist';
            $this->line("$artistName - $track->name (Track ID: $track->id)");
        }
    }

    private function listByArtist()
    {
        $artists = Artist::with('tracks')->get();

        $this->info('Artists:');
        foreach ($artists as $artist) {
            $this->line("$artist->name (Artist ID: $artist->id):");
            foreach ($artist->tracks as $index => $track) {
                $this->line("|__ $track->name (Track ID: $track->id)");
            }
        }
    }

}
