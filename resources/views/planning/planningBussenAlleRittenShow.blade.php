<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$busritINFO->busrit_id}},  {{$busritINFO->festivals->festival_naam}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"

                              action="{{route('alleritten.update', $busritINFO->busrit_id)}}"
                        >
                            @csrf
                            @method('PUT')
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Busrit id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->busrit_id}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Bus chauffeur id </label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->bussen->chauffeur_id}}</label>


                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Bus chauffeur naam </label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->bussen->chauffeurs->user->name}}</label>


                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Festival</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->festivals->festival_naam}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > datum</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->festivals->festival_datum}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Locatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->festivals->festival_locatie}}</label>


                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie
                            </label>
                            <input class="border-black rounded-lg mb-4 p2 w-1/2 " placeholder="{{$busritINFO->vertrekplaats_datum_tijd1 ?? "Wordt later bekend genmaakt"}}"
                            name="vertrekplaats_datum_tijd1">

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie
                            </label>
                            <input class="border-black rounded-lg mb-4 p2 w-1/2" placeholder="{{$busritINFO->vertrekplaats_datum_tijd2 ?? "Wordt later bekend genmaakt"}}"
                            name="vertrekplaats_datum_tijd2">

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie
                            </label>
                            <input class="border-black rounded-lg mb-4 p2 w-1/2"
                                   placeholder="{{$busritINFO->vertrekplaats_datum_tijd3 ?? "Wordt later bekend genmaakt"}}"
                                   name="vertrekplaats_datum_tijd3">

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "> Aantal inzittende</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->klant ?? '0'}} / 35</label>

                            <x-primary-button type="submit">update</x-primary-button>


                        </form>
                        <a href="{{route('alleritten.index')}}">
                            <x-primary-button type="submit">Terug</x-primary-button>
                        </a>
                    </div>

                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="text-left">Klant ID</th>
                            <th class="text-left">Naam</th>
                            <th class="text-left" >boeking id</th>
                            <th class="text-left">boeking datum</th>

                        </tr>
                        </thead>
                        @foreach($KlantenInBus as $klantInBus)
                            <tbody>

                            <tr>
                                <td>{{$klantInBus->klant_id}}</td>
                                <td>{{$klantInBus->klant->user->name}}</td>
                                <td>{{$klantInBus->boeking_id}} </td>
                                <td>{{$klantInBus->created_at}} </td>

                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
