<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('to-do-list:') }}
                    </h2>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="text-left">busrit id </th>
                            <th class="text-left">festival</th>
                            <th class="text-left" >festival datum</th>
                            <th class="text-left"></th>

                        </tr>
                        </thead>
                        @foreach($todos as $todo)
                            <tbody>

                            <tr>
                                <td>{{$todo->busrit_id}}</td>
                                <td>{{$todo->festivals->festival_naam}}</td>
                                <td>{{$todo->festivals->festival_datum}} </td>
                                <td>

                                    <a href="{{route('alleritten.show', $todo->busrit_id)}}">
                                    <x-primary-button>
                                        bekijk
                                    </x-primary-button>
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


{{-- een overzicht met elke busrit die nog een ophaalocatie nodig heeft --}}
