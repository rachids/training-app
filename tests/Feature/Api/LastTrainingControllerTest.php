<?php

namespace Tests\Feature\Api;

use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LastTrainingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_last_trainings()
    {
        // Given some training for today
        Training::factory()->create([
            'value' => 2
        ]);

        // When fetching api for last traning
        $response = $this->getJson(route('api.training.last'));

        // Then it should respond 200 and
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment([
            'repetitions' => 2,
        ]);
    }

    public function test_it_doesnt_return_past_trainings()
    {
        // Given a training done a week ago, and one done yesterday
        Training::factory()->count(2)->sequence(
            ['created_at' => now()->subWeek(), 'value' => 5],
            ['created_at' => now()->subDay(), 'value' => 9],
        )->create();

        // When fetching api for last training
        $response = $this->getJson(route('api.training.last'));

        // Then it should respond 200 with only the one with 9 repetitions
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment([
            'repetitions' => 9,
        ]);
    }
}
