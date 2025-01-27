<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Busreizen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full ">
                        <thead>
                        <tr>
                            <th>Festivalnaam</th>
                            <th>Datum</th>
                            <th>busrit id </th>
                            <th>locatie</th>
{{--                            <th>vertrekpunten en tijden </th>--}}

                        </tr>
                        </thead>
                        @foreach($busritten as $busrit)
                            @if(\Carbon\Carbon::parse($busrit->festivals->festival_datum)->isFuture())
                            <tbody>
                            <tr>
                                <td>{{$busrit->festivals->festival_naam}}</td>
                                <td>{{$busrit->festivals->festival_datum}}</td>
                                <td>{{$busrit->busrit_id}}</td>
                                <td>{{$busrit->festivals->festival_locatie}}</td>

                                <td>
                                    <a href="{{route('busreizen.show', $busrit->busrit_id)}}">

                                        <x-primary-button> info</x-primary-button>
                                    </a>

                                </td>
                            </tr>
                            </tbody>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
