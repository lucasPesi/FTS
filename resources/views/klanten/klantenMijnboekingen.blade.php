<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn boekingen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                       <table class="table-auto w-full ">
                           <thead>
                           <tr>
                               <th>Festivalnaam</th>
                               <th>Datum</th>
                               <th>busrit id </th>
                               <th>locatie</th>
                               <th>info</th>


                           </tr>
                           </thead>
                           @foreach($boekingVanKlant as $boeking)
                               <tbody>
                               <tr>
                                   <td>{{$boeking->festivals->festival_naam}}</td>
                                   <td>{{$boeking->festivals->festival_datum}}</td>
                                   <td>{{$boeking->busrit_id}}</td>
                                   <td>{{$boeking->festivals->festival_locatie}}</td>

                                   <td>

                                            <a href="{{route('mijnboekingen.show', $boeking->boeking_id)}}">
                                           <x-primary-button> info</x-primary-button>
                                            </a>
                                   </td>
                               </tr>
                               </tbody>
                           @endforeach
                       </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--alle data van de geboektefestivals, ook een info know, met alle data en een knop voor terug en een knop voor annuleren --}}
