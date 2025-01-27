<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle klanten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Klant ID</th>
                            <th>Naam</th>
                            <th>Aantal punten</th>
                            <th>
                                Opties
                            </th>
                        </tr>
                        </thead>
                        @foreach($klanten as $klant)

                            <tbody>
                            <tr>
                                <td >{{$klant->id}}</td>
                                <td>{{$klant->klant_id}}</td>
                                <td>{{$names[$loop->index]}}</td>

                                <td>{{$klant->aantal_punten}}</td>
                                <td>

                                    <a href="{{(route('alleklanten.edit', $klant->id))}}">
                                        <x-primary-button> edit</x-primary-button>
                                    </a>
                                    <form method="POST"
                                          action="{{route('alleklanten.destroy', $klant->id)}}"> @csrf @method('DELETE')
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
