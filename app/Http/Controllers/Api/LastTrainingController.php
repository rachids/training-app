<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;

class LastTrainingController extends Controller
{
    /**
     * Get the latest trainings stats.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(Request $request)
    {
        // TODO: Maybe refactor this to a subquery
        $lastDate = Training::latest()->select('created_at')->first();

        $trainings = Training::with('exercice:id,name')
            ->whereDate('created_at', $lastDate->created_at)
            ->get();

        return TrainingResource::collection($trainings);
    }
}
