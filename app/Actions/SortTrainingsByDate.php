<?php

namespace App\Actions;

use App\Models\Training;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Vastly inspired from Christoph Rumpl/Larastreamers 's SortStreamByDateAction
 * See https://github.com/christophrumpel/larastreamers/blob/477e0d7e735ce110eb78dd18d765dd4239ec1e6c/app/Actions/SortStreamsByDateAction.php
 */
class SortTrainingsByDate
{
    /**
     * This method regroup trainings by their date, then by the exercice name.
     *
     * @param Collection $trainings
     * @return Collection
     */
    public function handle(Collection $trainings): Collection
    {
        return $trainings->groupBy( fn(Training $training) => $training->created_at->format('Y-m-d'))
            ->mapWithKeys(function (Collection $item, string $date) {
                return [
                    $date => $item->mapWithKeys( function (Training $training) {
                        return [Str::lower($training->exercice->name) => $training];
                    })
                ];
            });
    }
}
