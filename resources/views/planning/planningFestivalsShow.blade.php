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
                        {{--                    {{ __("Alle festivalsModel") }}--}}


                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"
                        >
                            @csrf
                            @method("PUT")
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$hetFestival->festival_naam}}</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$hetFestival->festival_locatie}}</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$hetFestival->festival_datum}}</label>


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
