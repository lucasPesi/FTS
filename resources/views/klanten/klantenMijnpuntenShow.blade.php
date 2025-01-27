<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           U heeft  {{$klant->aantal_punten}} punten!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">

                    <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8"

                          action="{{route('punten.store')}}">
                        @csrf
                        @method("POST")

                        <input type="hidden" name="festival_id" value="{{$festival->festival_id}}">


                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > Festival:</label>
                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        >{{$festival->festival_naam}} </label>

                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > Locatie:</label>
                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        >{{$festival->festival_locatie}}</label>

                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > Datum:</label>
                        <label class="border-black rounded-lg mb-4 p2 w-1/2 "
                        > {{$festival->festival_datum}}</label>


                        <div class="mt-8">

                        <p>Let op, een VIP ticket kost 300 punten</p>
                        <br>
                        <x-primary-button id="hidden2" type="submit"></x-primary-button>

                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    // Get the number of "klant" dynamically from the PHP variable
                                    const KlantPunten = parseInt("{{$klant->aantal_punten ?? '0'}}");
                                    const Minimale = 300;

                                    // Get the button element
                                    const button = document.getElementById('hidden2');

                                    // Function to toggle button state and text
                                    function hidden2() {
                                        if (KlantPunten >= Minimale) {
                                            button.disabled = false; // Disable the button
                                            button.textContent = "Ik sta in de VIP!"; // Change the text
                                        } else {
                                            button.disabled = true; // Enable the button
                                            button.textContent = "U heeft te weinig punten"; // Reset the text
                                        }
                                    }

                                    // Initial check on page load
                                    hidden2();
                                });
                            </script>
                        </div>

                    </form>

                </div>
            </div>


            </div>

        </div>

</x-app-layout>
