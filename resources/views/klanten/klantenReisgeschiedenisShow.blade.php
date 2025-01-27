<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$boekingINFO->festivals->festival_naam}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"
                        >
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > boeking id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->boeking_id}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Busrit id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->busrit_id}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Festival</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->festivals->festival_naam}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > datum</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->festivals->festival_datum}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Locatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->festivals->festival_locatie}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->vertrekplaats_datum_tijd1 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->vertrekplaats_datum_tijd2 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$boekingINFO->vertrekplaats_datum_tijd3 ?? 'Wordt later bekend'}}</label>


                        </form>
                        <a href="{{route('reisgeschiedenis.index')}}">
                            <x-primary-button>Terug</x-primary-button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
