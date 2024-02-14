<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NonNumericIdsTest extends TestCase
{
    /**
     * A test to check behavior when non-numeric IDs are inserted.
     *
     * @return void
     */
    public function testNonNumericIds()
    {
        $play_command = $this->artisan('play', [
            'tracks' => ['hello', 'kooomo'],
        ]);

        // should exit with zero code
        $this->assertNotEquals(0, $play_command);
    }
}
