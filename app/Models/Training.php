<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'integer',
    ];

    public function exercice(): BelongsTo
    {
        return $this->belongsTo(Exercice::class);
    }

    public function scopeByDayAndExercice(Builder $query, string $date, int $exerciceId): Builder
    {
        return $query->where('exercice_id', $exerciceId)
            ->whereDate('created_at', $date);
    }

    public function scopeBetweenDates(Builder $query, string $from = null, string $to = null): Builder
    {
        $from = $from ?? now()->startOfMonth();
        $to = $to ?? now()->endOfMonth();

        return $query->whereBetween('created_at', [$from, $to])->latest();
    }
}
