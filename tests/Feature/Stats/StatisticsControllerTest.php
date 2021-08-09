<?php

namespace Tests\Feature\Stats;

use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_stats_for_the_month()
    {
        // Given some trainings
        Training::factory()->count(3)->sequence(
            ['created_at' => now()->subDay(), 'value' => 3],
            ['created_at' => now()->subDays(3), 'value' => 2],
            ['created_at' => now()->subWeek(), 'value' => 1],
        )->create();

        // When getting the stats
        $response = $this->get(route('stats.index'));

        // Then it should respond 200 and show each stat in its own line
        $response->assertStatus(200);
        $response->assertSeeInOrder([
            "3", "2", "1", "0"
        ]);
    }
}
