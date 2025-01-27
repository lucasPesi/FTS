<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle ritten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th>busrit ID</th>
                            <th>Festival naam & id </th>
                            <th>Festival datum</th>
                            <th>bus ID </th>
                            <th>Aantal inzittende</th>
                            <th> info </th>
                                </tr>
                        </thead>
                        @foreach($busritten as $busrit)
                            <tbody>
                            <tr>
                                <td>{{$busrit->busrit_id}}</td>
                                <td>{{$busrit->festivals->festival_naam}}, {{$busrit->festivals->festival_id}}</td>
                                <td>{{$busrit->festivals->festival_datum}}</td>
                                <td>{{$busrit->bus_id}}</td>
                                <td>{{$busrit->klant}}</td>

                                <td>
                                    <a href="{{route('alleritten.show', $busrit->busrit_id)}}">
                                        <x-primary-button> Show</x-primary-button>
                                    </a>
                                    <a href="">
                                        <x-primary-button> edit</x-primary-button>
                                    </a>
                                    <form method="POST"
                                          action=""> @csrf @method('DELETE')
                                        <x-primary-button type="submit">delete</x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <div class="pagination">
                        {{ $busritten->links() }}
                    </div>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>
