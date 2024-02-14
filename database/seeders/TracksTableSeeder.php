<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Track;


class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artistIds = range(1, 50);

        for ($i = 1; $i <= 200; $i++) {
            // Randomly select an artist ID
            $artistId = $artistIds[array_rand($artistIds)];

            Track::create([
                'name' => "Track $i",
                'artist_id' => $artistId,
            ]);

        }
    }
}
