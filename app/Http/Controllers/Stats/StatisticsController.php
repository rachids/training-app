<?php

namespace App\Http\Controllers\Stats;

use App\Actions\SortTrainingsByDate;
use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StatisticsController extends Controller
{
    public function __invoke(Request $request)
    {
        // Get boundary dates, default to current month.
        $from = $request->get('from', now()->startOfMonth());
        $to = $request->get('to', now()->endOfMonth());

        // Get trainings with their exercice name.
        $trainings = Training::with('exercice:id,name')
            ->betweenDates($from, $to)
            ->get();

        return view('training.stats', [
            'exercices' => $trainings->pluck('exercice.name'),
            'trainings' => (new SortTrainingsByDate())->handle($trainings),
        ]);
    }
}
