<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('festivalss') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"
                  action="{{route('Festivals.store')}}">
                @csrf
                <input class="border-black rounded-lg mb-4 p2 w-1/2 " placeholder="Festival" name="festival_naam"
                       id="festival_naam">
                <input class="border-black rounded-lg mb-4 p2 w-1/2" placeholder="Locatie" name="festival_locatie"
                       id="festival_locatie">
                <input class="border-black rounded-lg mb-4 p2 w-1/2" type="date" placeholder="Datum"
                       name="festival_datum" id="festival_locatie">

                <x-primary-button type="submit">Voeg toe</x-primary-button>
            </form>
            {{--hide en unhide maken met JS op de create button hieronder--}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th>Festival</th>
                            <th>locatie</th>
                            <th>datum</th>
                            <th>
                                <x-primary-button>create</x-primary-button>
                            </th>
                        </tr>
                        </thead>
                        @foreach($alleFestivals as $festival)
                            <tbody>
                            <tr>
                                <td hidden="hidden">{{$festival->festival_id}}</td>
                                <td>{{$festival->festival_naam}}</td>
                                <td>{{$festival->festival_locatie}}</td>
                                <td>{{$festival->festival_datum}}</td>
                                <td>
                                    <a href="{{route('Festivals.show', $festival->festival_id)}}">
                                        <x-primary-button> Show</x-primary-button>
                                    </a>
                                    <a href="{{route('Festivals.edit', $festival->festival_id)}}">
                                        <x-primary-button> edit</x-primary-button>
                                    </a>
                                    <form method="POST"
                                          action="{{route('Festivals.destroy', $festival->festival_id)}}"> @csrf @method('DELETE')
                                        <x-primary-button type="submit">delete</x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
