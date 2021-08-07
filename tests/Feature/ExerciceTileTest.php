<?php

namespace Tests\Feature;

use App\Models\Exercice;
use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ExerciceTileTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_form_for_saving()
    {
        // Given an exercice
        $exercice = Exercice::factory()->create();

        Livewire::test('exercice-tile', [
            'isForm' => false,
            'exercice' => $exercice,
        ])->set('isForm', true)
            ->assertSeeHtml('<input type="hidden" name="exercice_id" value="' .$exercice->id. '" />');
    }

    public function test_it_shows_form_for_updating()
    {
        // Given an exercice with a training
        $exercice = Exercice::factory()->has(Training::factory())->create();

        Livewire::test('exercice-tile', [
            'isForm' => false,
            'exercice' => $exercice,
        ])->set('isForm', true)
            ->assertSeeHtml('<input type="hidden" name="training_id" value="' .$exercice->trainings()->first()->id. '" />');
    }
}
