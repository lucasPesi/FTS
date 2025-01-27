<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">

                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"

                              action="{{route('register')}}">
                            @csrf

                            @method("GET")
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Busrit id</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->busrit_id}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Festival</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->festivals->festival_naam}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > datum</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->festivals->festival_datum}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Locatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->festivals->festival_locatie}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->vertrekplaats_datum_tijd1 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->vertrekplaats_datum_tijd2 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Vertreklocatie</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->vertrekplaats_datum_tijd3 ?? 'Wordt later bekend'}}</label>

                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            > Aantal inzittende</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                            >  {{$deBusrit->klant ?? '0'}} / 35</label>

                            <x-primary-button id="toggleButton" type="submit">Boek nu</x-primary-button>

                            <script>
                                document.addEventListener('DOMContentLoaded', ()=>{
                                    const klantcount = parseInt("{{$deBusrit->klant ?? '0'}}", 10 );
                                    const maxKlant = 35;

                                    const button = document.getElementById('toggleButton');

                                    function toggleButton(){
                                        if (klantcount >= maxKlant){
                                            button.disabled =  true;
                                            button.textContent = 'de bus is vol';
                                        } else {
                                            button.disabled = false;
                                            button.textContent = 'reserveer!';
                                        }
                                    }
                                    toggleButton();
                                })
                            </script>
                        </form>
                        <a href="{{route("Busreizen.index")}}">
                            <x-primary-button>Terug</x-primary-button>
                        </a>

                    </div>
                </div>
            </div>

</x-guest-layout>
