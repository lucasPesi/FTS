<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$festivalINFO->festival_naam}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"
                        >
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Festival id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$festivalINFO->festival_id}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Festival</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$festivalINFO->festival_naam}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Datum</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$festivalINFO->festival_datum}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Locatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$festivalINFO->festival_locatie}}</label>

                        </form>

                        <div class="flex justify-center mt-32">
                        <h1>Alle  bussen naar    {{$festivalINFO->festival_naam}}</h1>
                        </div>
                        <div class="flex flex-wrap">



                            @foreach($busritten as $busrit)


                                    <div
                                        class=" mt-10 div h-[12em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                        <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                        <a href="{{route('busreizen.show', $busrit->busrit_id )}}">
                                            <x-primary-button>Bekijk</x-primary-button>
                                        </a>
                                        <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">
                                            busrit:
                                            {{$busrit->busrit_id}}
                                        </h1>
                                        <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                            Vertrekinformatie:
                                        </h1>

                                        <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                            {{$busrit->vertrekplaats_datum_tijd1 ?? 'Wordt later bekend'}}
                                        </h1>
                                        <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                            {{$busrit->vertrekplaats_datum_tijd2 ?? 'Wordt later bekend'}}
                                        </h1>
                                        <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                            {{$busrit->vertrekplaats_datum_tijd3 ?? 'Wordt later bekend'}}
                                        </h1>

                                    </div>

                            @endforeach
                        </div>


                        <a href="{{route('festivalss.index')}}">
                            <x-primary-button>Terug</x-primary-button>
                        </a>



                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
