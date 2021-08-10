<div class="flex">
    <a href="{{ route('training.index') }}" class="rounded shadow-lg bg-blue-200 p-3 mb-2 mx-auto hover:bg-green-200">
        <span class="text-sm font-bold text-black">
            Entraînement
        </span>
    </a>

    <a href="{{ route('stats.index') }}" class="rounded shadow-lg bg-blue-200 p-3 mb-2 mx-auto hover:bg-green-200">
        <span class="text-sm font-bold text-black">
            Stats par journée
        </span>
    </a>

    <a href="{{ route('exercices.index') }}" class="rounded shadow-lg bg-yellow-200 p-3 mb-2 mx-auto hover:bg-green-200 hidden sm:block">
        <span class="text-sm font-bold text-black">
            Exercices
        </span>
    </a>
</div>
