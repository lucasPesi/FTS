<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn punten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class=" p-6 text-gray-900 flex flex-col" >


                    <p class="text-3xl">U heeft {{$klant->aantal_punten}} punten! </p>

                    <div class="mt-8 ">
                        uw tickets:
                    </div>

                    <div class="flex flex-wrap">

                        @foreach($VIPtickets as $VIPticket)
                            <div
                                class=" mt-10 div h-[10em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                <a href="{{route('punten.edit', $VIPticket->VIPticketID)}}">
                                    <x-primary-button>Bekijk</x-primary-button>
                                </a>
                                <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">
                                    {{$VIPticket->festivals->festival_naam}}
                                </h1>
                                <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                    {{$VIPticket->festivals->festival_datum}}
                                </h1>
                                <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                    {{$VIPticket->festivals->festivals_datum}}
                                </h1>
                            </div>

                        @endforeach
                    </div>
                    </div>
            </div>
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex align-middle justify-center mt-8 text-3xl">
                    <h1>
                        Alle festivals
                    </h1>
                </div>
                <div class="flex flex-wrap justify-center m-16 ">

                    @foreach($festivals as $festival)

                        <div
                            class="div h-[10em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                            <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[#FF5800] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                            <a href="{{route('punten.show', $festival->festival_id)}}">
                            <x-primary-button>VIP?</x-primary-button>
                            </a>
                            <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">
                                {{$festival->festival_naam}}
                            </h1>
                            <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                {{$festival->festival_locatie}}
                            </h1>
                            <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                {{$festival->festival_datum}}
                            </h1>
                        </div>


                    @endforeach

                </div>
            </div>

        </div>

    </div>
</x-app-layout>
