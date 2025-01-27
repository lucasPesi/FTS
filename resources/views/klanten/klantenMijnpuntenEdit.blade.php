<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            U heeft  {{$vipticketinfo->klant->aantal_punten}} punten!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">

                    <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"

                          action="{{route('punten.destroy', $vipticketinfo->VIPticketID)}}">
                        @csrf
                        @method("DELETE")

                        <input type="hidden" name="" value="">


                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > Festival:</label>
                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        >{{$vipticketinfo->festivals->festival_naam}} </label>

                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > Locatie:</label>
                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        >{{$vipticketinfo->festivals->festival_locatie}}</label>

                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > Datum:</label>
                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > {{$vipticketinfo->festivals->festival_datum}}</label>


                        <div class="mt-8">

                            <p>Let op, als u de VIP ticket annuleerd, ontvangt u 300 punten!</p>
                            <br>
                            <x-primary-button type="submit">Annuleren</x-primary-button>

                        </div>

                    </form>

                </div>
            </div>


        </div>

    </div>

</x-app-layout>
