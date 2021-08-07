<?php

namespace App\Http\Livewire;

use App\Models\Training;
use Livewire\Component;
use App\Models\Exercice;

class ExerciceTile extends Component
{
    public Exercice $exercice;
    public bool $isForm = false;
    public ?Training $training;

    public function mount(Exercice $exercice)
    {
        $this->exercice = $exercice;

        $this->checkIfTrainingExist();
    }

    public function render()
    {
        return view('livewire.exercice');
    }

    public function checkIfTrainingExist()
    {
        // we need to check if there is a training for this date.
        $this->training = Training::byDayAndExercice(now()->format('Y-m-d'), $this->exercice->id)->first();
    }

    public function toggleForm()
    {
        $this->isForm = !$this->isForm;
    }
}
