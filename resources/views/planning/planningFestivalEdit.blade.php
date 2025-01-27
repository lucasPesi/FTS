<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle ritten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">


                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"
                              action="{{route('Festivals.update', $hetFestival->festival_id)}}">
                            @csrf
                            @method("PUT")
                            <input class="border-black rounded-lg mb-4 p2 w-1/2 "
                                   value="{{old('festival', $hetFestival->festival_naam)}}" name="festival_naam">
                            <input class="border-black rounded-lg mb-4 p2 w-1/2"
                                   value="{{old ('festival locatie',$hetFestival->festival_locatie)}}" name="festival_locatie">
                            <input class="border-black rounded-lg mb-4 p2 w-1/2" type="date"
                                   value="{{old('datum', $hetFestival->festival_datum)}}" name="festival_datum">

                            <x-primary-button type="submit">Update</x-primary-button>


                        </form>
                            <a href="{{route('Festivals.index')}}">
                        <x-primary-button>Terug</x-primary-button>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
