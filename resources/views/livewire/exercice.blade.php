<div class="rounded shadow-lg bg-green-200 w-3/4 p-3 mb-2 mx-auto">
    <div class="flex">
        <h2 class="text-lg font-bold text-blue-800 flex-1">
            {{ $exercice->name }}
        </h2>
        <a href="{{ $exercice->video_url }}" target="_blank" class="block">
            📺
        </a>
        <span class="block" wire:click="$set('isForm', true)">
            🖋️
        </span>
    </div>
    @if ($isForm)
        @if (is_null($training))
            <form method="post" action="{{ route('training.store') }}">
            <input type="hidden" name="exercice_id" value="{{ $exercice->id }}" />
        @else
            <form method="post" action="{{ route('training.update') }}">
            @method('patch')
            <input type="hidden" name="training_id" value="{{ $training->id }}" />
            <p class="text-xs text-red-500">
                Tu t'es déjà entraîné ajd! <br>
                Tu peux modifier la valeur:
            </p>
        @endif
            @csrf
            <div class="flex justify-center">
                <input type="text" name="reps" id="reps" value="{{ $training->value ?? null }}" class="w-1/4 text-lg focus:ring-indigo-500 focus:border-indigo-500 block pl-3 border-blue-300 rounded-md" placeholder="1">
                <div class="m-2">
                    <button type="submit" class="mr-2">
                        💾
                    </button>
                    <span wire:click="$set('isForm', false)">
                        ❌
                    </span>
                </div>
            </div>
        </form>
    @else
        <p>{{ $exercice->description }}</p>
    @endif
</div>
