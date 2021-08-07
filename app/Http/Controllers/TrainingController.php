<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTraining;
use App\Http\Requests\UpdateTraining;
use App\Models\Exercice;
use App\Models\Training;
use Illuminate\Http\RedirectResponse;

class TrainingController extends Controller
{
    public function index()
    {
        $exercices = Exercice::enabled()->get();

        return view('training.index', compact('exercices'));
    }

    public function store(StoreTraining $request): RedirectResponse
    {
        $exercice = Exercice::findOrFail($request->get('exercice_id'));

        $training = new Training();
        $training->value = $request->get('reps');
        $training->exercice()->associate($exercice);
        $training->save();

        return redirect()->route('training.index')
            ->with('success', "{$exercice->name}: +{$training->value} reps - {$training->created_at->format('d/m/Y')}");
    }

    public function update(UpdateTraining $request): RedirectResponse
    {
        $training = Training::with('exercice')->findOrFail($request->get('training_id'));
        $training->value = $request->get('reps');
        $training->save();

        return redirect()->route('training.index')
            ->with('success', "[UPDATED] {$training->exercice->name}: +{$training->value} reps - {$training->created_at->format('d/m/Y')}");
    }
}
