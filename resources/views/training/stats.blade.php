@extends('template')

@section('content')
    <div class="mx-auto rounded p-5 bg-blue-100 border border-indigo-900">
        <h1 class="text-lg">Statistiques</h1>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                @foreach($exercices as $exerciceName)
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $exerciceName }}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trainings as $date => $training)
                                @if($loop->odd)
                                    <tr class="bg-white">
                                @else
                                    <tr class="bg-gray-50">
                                @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $date }}
                                    </td>
                                    @foreach($exercices as $exerciceName)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $training[\Illuminate\Support\Str::lower($exerciceName)]->value ?? 0 }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
