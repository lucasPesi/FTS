<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$busrit->festivals->festival_naam}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8 "
                        >
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >Busrit id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >{{$busrit->busrit_id}}</label>


                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >Festival</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >   {{$busrit->festivals->festival_naam}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >Vertrekinformatie:</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >{{$busrit->vertrekplaats_datum_tijd1  ?? 'Wordt later bekend gemaakt' }}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >Vertrekinformatie:</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >{{$busrit->vertrekplaats_datum_tijd2  ?? 'Wordt later bekend gemaakt' }}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >Vertrekinformatie:</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >{{$busrit->vertrekplaats_datum_tijd3  ?? 'Wordt later bekend gemaakt' }}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >Aantal inzittende:</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >{{$busrit->klant}} / 35 </label>



                        </form>
                        <a href="{{route('MijnRitten.index')}}">
                            <x-primary-button>Terug</x-primary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
