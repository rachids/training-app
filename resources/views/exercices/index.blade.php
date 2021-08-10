@extends('template')

@section('content')
    <div class="text-yellow-200">
        <h1 class="text-2xl">Exercices</h1>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                # ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Vidéo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Activé
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Options</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exercices as $exercice)
                            @if($loop->odd)
                                <tr class="bg-white">
                            @else
                                <tr class="bg-gray-50">
                            @endif
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $exercice->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('exercices.show', $exercice) }}">
                                        {{ $exercice->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <p>
                                        {{ $exercice->description }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                        {{ $exercice->video_url }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($exercice->is_enabled)
                                        YES
                                    @else
                                        NOPE
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('exercices.edit', $exercice) }}" class="text-indigo-600 hover:text-indigo-900">
                                        Modifier
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                            <tr class="bg-gray-100">
                                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    <a href="{{ route('exercices.create') }}" class="inline-block m-1 p-3 rounded text-white bg-indigo-500 hover:bg-indigo-900">
                                        + Créer un nouvel exercice
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
