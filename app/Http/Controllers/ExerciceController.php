<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExercice;
use App\Models\Exercice;

class ExerciceController extends Controller
{
    public function index()
    {
        $exercices = Exercice::all();

        return view('exercices.index', compact('exercices'));
    }

    public function create()
    {
        return view('exercices.create', [
            'exercice' => new Exercice(),
        ]);
    }

    public function store(StoreExercice $request)
    {
        $exercice = new Exercice();

        $exercice->name = $request->get('nom');
        $exercice->description = $request->get('description');
        $exercice->video_url = $request->get('video');
        $exercice->is_enabled = $request->get('enabled');

        $exercice->save();

        return redirect()->route('exercices.index')->with('success', "L'exercice {$exercice->name} est sauvegardé.");
    }

    public function show(Exercice $exercice)
    {
        //
    }

    public function edit(Exercice $exercice)
    {
        return view('exercices.edit', [
            'exercice' => $exercice,
        ]);
    }

    public function update(StoreExercice $request, Exercice $exercice)
    {
        $exercice->name = $request->get('nom');
        $exercice->description = $request->get('description');
        $exercice->video_url = $request->get('video');
        $exercice->is_enabled = $request->get('enabled');

        $exercice->save();

        return redirect()->route('exercices.index')->with('success', "L'exercice {$exercice->name} est modifié.");
    }

    public function destroy(Exercice $exercice)
    {
        $exercice->delete();

        return redirect()->route('exercices.index')->with('success', "L'exercice {$exercice->name} est supprimé.");
    }
}
