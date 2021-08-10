<?php
if($exercice->exists) {
    $route = route('exercices.update', $exercice);
    $method = 'PUT';
    $canDelete = true;
} else {
    $route = route('exercices.store');
    $method = 'POST';
    $canDelete = false;
}
?>

<form method="post" action="{{ $route }}">
    @csrf
    @method($method)
    <div class="flex justify-around mb-2">
        <div class="w-1/3">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom de l'exercice</label>
            <div class="mt-1">
                <input type="text" name="nom" id="nom" value="{{ $exercice->name }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Éplucher des pommes de terre">
            </div>
            @error('nom')
            <span class="block text-sm pl-5 text-red-600">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="w-1/3">
            <label for="video" class="block text-sm font-medium text-gray-700">URL de vidéo explicative</label>
            <div class="mt-1">
                <input type="text" name="video" id="video" value="{{ $exercice->video_url }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="https://yootoob.com">
            </div>
            @error('video')
            <span class="block text-sm pl-5 text-red-600">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="flex justify-around mb-2">
        <div class="w-1/3">
            <label for="description" class="block text-sm font-medium text-gray-700">Courte description</label>
            <div class="mt-1">
                <textarea type="text" name="description" id="description" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Ça va suer.. !">{{ $exercice->description }}</textarea>
            </div>
            @error('description')
            <span class="block text-sm pl-5 text-red-600">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="w-1/3">
            <label for="enabled" class="block text-sm font-medium text-gray-700">Activé</label>
            <div class="mt-1">
                <input type="hidden" name="enabled" value="0"/>
                <input id="enabled" aria-describedby="enabled-description" name="enabled" type="checkbox" value="1" @if($exercice->is_enabled) checked="checked" @endif class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            </div>
            @error('enabled')
            <span class="block text-sm pl-5 text-red-600">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="pt-5">
        <div class="flex justify-center">
            <a href="{{ route('exercices.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Annuler
            </a>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enregistrer
            </button>
            @if($canDelete)
            <button type="submit" form="deleteExercice" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Supprimer
            </button>
            @endif
        </div>
    </div>
</form>

@if($canDelete)
    <form id="deleteExercice" method="post" action="{{ route('exercices.destroy', $exercice) }}">
        @method('DELETE')
        @csrf
    </form>
@endif
