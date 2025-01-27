<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">

                <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"

                      action="{{route('register')}}">
                    @csrf

                    @method("GET")
                    <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                    >Festival</label>
                    <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                    >  {{$festival->festival_naam}}</label>


                    <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                    >Datum</label>
                    <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                    >  {{$festival->festival_datum}}</label>

                    <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                    >Locatie</label>
                    <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                    >  {{$festival->festival_locatie}}</label>

                    <x-primary-button  type="submit">Boek nu</x-primary-button>

                </form>
                <a href="{{route("busreizen.index")}}">
                    <x-primary-button>Terug</x-primary-button>
                </a>

            </div>
        </div>
    </div>

</x-guest-layout>
