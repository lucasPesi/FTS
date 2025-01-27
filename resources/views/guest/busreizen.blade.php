<x-guest-layout>

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="text-left">busrit id </th>
            <th class="text-left" >festival</th>
            <th class="text-left">festival datum</th>
            <th class="text-left">aantal inzettende</th>

        </tr>
        </thead>
        @foreach($busritten as $busrit)
            @if(\Carbon\Carbon::parse($busrit->festivals->festival_datum)->isFuture())
                <tbody>

                <tr>
                    <td>{{$busrit->busrit_id}}</td>
                    <td>{{$busrit->festivals->festival_naam}} </td>
                    <td>{{$busrit->festivals->festival_datum}} </td>
                    <td>{{$busrit->klant}} / 35 </td>
                    <td>

                        <a href="{{route('Busreizen.show', $busrit->busrit_id)}}">
                            <x-primary-button>
                                bekijk
                            </x-primary-button>
                        </a>
                    </td>
                </tr>
                </tbody>
            @endif
        @endforeach
    </table>

</x-guest-layout>

