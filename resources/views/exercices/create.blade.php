@extends('template')

@section('content')
    <div class="text-yellow-200">
        <h1 class="text-2xl">Nouvel Exercice</h1>

        <a href="{{ route('exercices.index') }}" class="p-3 mt-5 hover:text-yellow-500 hover:underline">
            Retour aux exercices
        </a>
    </div>

    <div class="bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            @include('exercices.partials.form')
        </div>
    </div>
@endsection
