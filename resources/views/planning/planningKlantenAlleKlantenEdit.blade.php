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



                        <form method="POST" class="border-black w-auto flex flex-wrap  px-40 mt-8 mb-8 "
                              action="{{route('alleklanten.update', $klantinfo->id)}}"
                        >
                            @csrf
                            @method("PUT")
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 m-1 "
                            >  {{$klantinfo->id}}</label>
                            <label class="border-black rounded-lg mb-4 p2 w-1/2 m-1"
                            >  {{$klantinfo->klant_id}}</label>
                            <input class="border-black rounded-lg mb-4 p2 w-1/2 m-1"
                                   value="{{old('Name', $userinfo->name)}}" name="name">
                            <input class="border-black rounded-lg mb-4 p2 w-1/2 m-1" type="email"
                                   value="{{old('email', $userinfo->email)}}" name="email">


                            <input class="border-black rounded-lg mb-4 p2 w-1/2"
                                   value="{{old('aantal punten', $klantinfo->aantal_punten)}}" name="aantal_punten">


{{--                            <input class="border-black rounded-lg mb-4 p2 w-1/2"--}}
{{--                                   value="{{old('role id', $userinfo->role_id)}}" name="role_id">--}}

                            <x-primary-button type="submit">Update</x-primary-button>


                        </form>
                        <a href="{{route('alleklanten.index')}}">
                            <x-primary-button>Terug</x-primary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
