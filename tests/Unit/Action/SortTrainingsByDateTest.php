<?php

namespace Tests\Unit\Action;

use App\Actions\SortTrainingsByDate;
use App\Models\Exercice;
use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SortTrainingsByDateTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_trainings_sorted_by_date()
    {
        // Given some trainings for various exercices
        Exercice::factory()
            ->has(
                Training::factory()->count(2)->sequence(
                    ['created_at' => now()->subDay(), 'value' => 2],
                    ['created_at' => now(), 'value' => 3],
            ))->create([
                'name' => 'Abdos',
            ]);

        Exercice::factory()
            ->has(
                Training::factory()->count(2)->sequence(
                    ['created_at' => now()->subDay(), 'value' => 15],
                    ['created_at' => now(), 'value' => 20],
                ))->create([
                'name' => 'Pompes',
            ]);

        // When sorting them using the sort by date action
        $trainings = Training::with('exercice:id,name')
            ->betweenDates()
            ->get();

        $trainings = (new SortTrainingsByDate())->handle($trainings);

        // Then it should have the date as array keys
        $this->assertEquals(now()->format('Y-m-d'), $trainings->keys()[0]);
        $this->assertEquals(now()->subDay()->format('Y-m-d'), $trainings->keys()[1]);

        // and then each should have the exercise name as key
        foreach ($trainings as $training)
        {
            $this->assertEquals('abdos', $training->keys()[0]);
            $this->assertEquals('pompes', $training->keys()[1]);
        }
    }
}
