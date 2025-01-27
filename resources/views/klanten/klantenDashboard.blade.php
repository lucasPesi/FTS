<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1> Boekingen </h1>

                    <div class="flex flex-wrap">
{{--ook nog aanpassen dat als er geen data is er wat wordt gezegd. if empty doe dit
 dit geldt ook voor de vip ticket --}}

                        @foreach($boekingen as $boeking)
                            @if(\Carbon\Carbon::parse($boeking->festivals->festival_datum)->isFuture())

                                <div
                                    class=" mt-5 div h-[8em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                    <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                    <a href="{{route('mijnboekingen.show', $boeking->boeking_id)}}">
                                        <x-primary-button>Bekijk</x-primary-button>
                                    </a>
                                    <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">
                                    {{$boeking->festivals->festival_naam}}
                                    </h1>
                                    <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                        busrit:
                                    {{$boeking->busrit_id}}
                                    </h1>
                                    <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">

                                    </h1>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="pagination">  {{$boekingen->appends(['boekingen' => $boekingen->currentpage()])->links()}}</div>
{{--                    er was een probleem met 2 paginatons, door appends toe te passen, kan er onderscheid gemaakt worden.--}}

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900 flex">


                    <div class="w-1/3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8 border-r-2 mr-5" >
                        <div class="p-6 text-gray-900">

                            <div class="text-center ">

                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl mt-8">{{$klantInfo->aantal_punten}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    Punten!
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8 border-l-2">
                        <div class="p-6 text-gray-900">


                            <div class="p-6 text-gray-900">
                                <h1>Vip tickets  </h1>
                                <div class="flex flex-wrap">
                                    @foreach($viptickets as $vipticket)

                                            <div
                                                class=" mt-5 div h-[8em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                                <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                                <a href="{{route('punten.edit', $vipticket->VIPticketID)}}">
                                                    <x-primary-button>Bekijk</x-primary-button>
                                                </a>
                                                <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">
                                                    {{$vipticket->festivals->festival_naam}}
                                                </h1>
                                                <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                                    {{$vipticket->festivals->festival_datum}}
                                                </h1>
                                                <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">

                                                </h1>
                                            </div>

                                    @endforeach
                                </div>

                                <div class="pagination">  {{$viptickets->appends(['viptickets' => $viptickets->currentpage()])->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</x-app-layout>



