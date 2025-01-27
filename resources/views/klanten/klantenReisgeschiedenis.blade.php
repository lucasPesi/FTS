<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reisgeschiedenis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap">

                        @foreach($boekingen as $boeking)
                            @if(\Carbon\Carbon::parse($boeking->festivals->festival_datum)->isPast())
{{--                                IPV if carbon, kan je ook in de controller, select all from boeking where klant id is klant id en date =< then current date.--}}
                            <div
                                class=" mt-10 div h-[10em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                <a href="{{route('reisgeschiedenis.show', $boeking->boeking_id)}}">
                                    <x-primary-button>Bekijk</x-primary-button>
                                </a>
                                <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">
                                    {{$boeking->festivals->festival_naam}}
                                </h1>
                                <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                    {{$boeking->festivals->festival_datum}}
                                </h1>
                                <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                    {{$boeking->festivals->festivals_locatie}}
                                </h1>

                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
