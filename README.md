## System requirements
* PHP 8+
* MySQL or any other database engine of your choice, supported by Laravel (see `config/database.php`)

## Special note
* For simplicity, Laravel Cache (`Illuminate\Support\Facades\Cache`) is used to store state. The database is only used for data (tracks and artists).

## Set-up
1. Make sure you're in the right directory: `cd jukebox-cli/`
2. Install dependencies: `composer install`
3. Create a new `.env` file based on `.env.example`: `cp .env.example .env`
4. Fill in your database details in the `.env` file.
5. Run the migrations: `php artisan migrate`
6. Seed the tables with dummy data: `php artisan migrate:refresh --seed && php artisan db:seed --class=ArtistsTableSeeder && php artisan db:seed --class=TracksTableSeeder`

## Usage
* `php artisan list`: Lists all artists and tracks, with a number associated
* `php artisan play [Track ID]`: Plays the track identified by the corresponding number. If there is a track already playing, it adds it to the queue. It also takes a list of numbers and adds the extra tracks to the queue.
* `php artisan queue`: lists contents of the queue including currently playing track
* `php artisan playing`: gives details of the currently playing track
* `php artisan clear`: clears queue and current playing track

## Features
All tracks from a given artist will be played sequentially, in the order they were added, grouped by their respective artists.

## Tests
A feature test can be ran with `php artisan test`. No unit tests are available.
