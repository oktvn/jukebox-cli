## System requirements
* PHP 8+
* MySQL or any other database engine of your choice, supported by Laravel (see `jukebox-cli/config/database.php`)

## Set-up
1. Make sure you're in the right directory: `cd jukebox-cli/`
2. Install dependencies: `composer install`
3. Create a new `.env` file based on `.env.example`: `cp .env.example .env`
4. Fill in your database details in the `.env` file.
5. Run the migrations and seed the tables with dummy data: `php artisan migrate && php artisan migrate:refresh --seed && php artisan db:seed --class=ArtistsTableSeeder && php artisan db:seed --class=TracksTableSeeder`

## Usage
* `list`: Lists all artists and tracks, with a number associated
* `play ...`: Plays the track identified by the corresponding number. If there is a track already playing, it adds it to the queue. It also takes a list of numbers and adds the extra tracks to the queue.
* `queue`: lists contents of the queue including currently playing track
* `playing`: gives details of the currently playing track
* `clear`: clears queue and current playing track

## Features
All tracks from a given artist will be played sequentially, in the order they were added, group by their respective artists, also in the order added.

## Tests
A feature test can be ran with `php artisan test`. No unit tests are available.