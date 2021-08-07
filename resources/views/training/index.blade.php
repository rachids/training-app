@extends('template')

@section('content')
    @foreach($exercices as $exercice)
        <livewire:exercice-tile :exercice="$exercice" />
    @endforeach
@endsection
