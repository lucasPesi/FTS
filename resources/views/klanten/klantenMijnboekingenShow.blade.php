<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('de busrit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"

                            action="{{route('mijnboekingen.destroy', $deboeking->boeking_id)}}"
                        >
                            @csrf
                            @method("DELETE")

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Busrit id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deboeking->busrit_id}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Festival</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deboeking->festivals->festival_naam}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > datum</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deboeking->festivals->festival_datum}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Locatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deboeking->festivals->festival_locatie}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->vertrekplaats_datum_tijd1 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->vertrekplaats_datum_tijd2 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->vertrekplaats_datum_tijd3 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Aantal inzittende</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$busritINFO->klant ?? '0'}} / 35</label>


                            @if(\Carbon\Carbon::parse($deboeking->festivals->festival_datum)->isFuture())
                            <x-primary-button type="submit">Annuleer </x-primary-button>
                            @endif
                        </form>
                        <a href="/klant/mijnritten/mijnboekingen">
                        <x-primary-button type="submit">Terug</x-primary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
