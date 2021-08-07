<?php

namespace Tests\Feature;

use App\Models\Exercice;
use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrainingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_enabled_exercices()
    {
        // Given an enabled exercice
        $exercice = Exercice::factory()->create();

        // and a disabled exercice
        $disabled = Exercice::factory()->create([
            'is_enabled' => false,
        ]);

        // When getting the index
        $response = $this->get(route('training.index'));

        // Then it shouldnt show the disabled exercice
        $response->assertDontSee($disabled->name);
        $response->assertSee($exercice->name);
    }

    public function test_it_saves_training()
    {
        // Given an exercice
        $exercice = Exercice::factory()->create();

        // When posting a new training
        $payload = [
            'reps' => 5,
            'exercice_id' => $exercice->id,
        ];
        $response = $this->post(route('training.store'), $payload);

        // Then it should have a training in database
        $this->assertDatabaseHas('trainings', [
            'exercice_id' => $exercice->id,
            'value' => 5,
        ]);
        // And it should redirect
        $response->assertRedirect(route('training.index'));
    }

    public function test_it_updates_training()
    {
        // Given a training as of today
        $training = Training::factory()->create([
            'value' => 5,
        ]);

        // When updating the training
        $payload = [
            'training_id' => $training->id,
            'reps' => 8,
        ];
        $this->patch(route('training.update'), $payload);

        // Then it should have the correct amount in database
        $this->assertDatabaseHas('trainings', [
            'id' => $training->id,
            'value' => 8,
        ]);
    }
}
