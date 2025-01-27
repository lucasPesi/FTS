<x-guest-layout>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden  sm:rounded-lg">
                <div class=" text-gray-900">

                    <h1 class="text-xl">Busreizen </h1>

                    <div class="flex flex-wrap">


                        @foreach($busritten as $busrit)
                            @if(\Carbon\Carbon::parse($busrit->festivals->festival_datum)->isFuture())

                                <div
                                    class=" mt-5 div h-[12em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                    <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                    <a href="{{route('Busreizen.show', $busrit->busrit_id)}}">
                                        <x-primary-button>Bekijk</x-primary-button>
                                    </a>
                                    <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">

                                    </h1>
                                    <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 ">
                                        Busrit:  {{$busrit->busrit_id}}
                                    </h1>
                                    <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                        {{$busrit->festivals->festival_naam}} trapt de opening af in {{$busrit->festivals->festival_locatie}} op {{$busrit->festivals->festival_datum}}
                                    </h1>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="pagination">  {{$busritten->appends(['busritten' => $busritten->currentpage()])->links()}}</div>

                </div>
            </div>
            <div class="mt-8 bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">

                    <h1 class="text-xl">Festivals </h1>

                    <div class="flex flex-wrap">


                        @foreach($festivals as $festival)
                            @if(\Carbon\Carbon::parse($festival->festival_datum)->isFuture())

                                <div
                                    class=" mt-5 div h-[12em] w-[20em] bg-white m-auto rounded-[1em] overflow-hidden relative group p-2 z-0 px-20">
                                    <div class="circle absolute h-[5em] w-[5em] -top-[2.5em] -right-[2.5em] rounded-full bg-[blue] group-hover:scale-[800%] duration-500 z-[-1] op"></div>
                                    <a href="{{route('Festival.show', $festival->festival_id)}}">
                                        <x-primary-button>Bekijk</x-primary-button>
                                    </a>
                                    <h1 class="z-20 font-bold font-Poppin group-hover:text-white duration-500 text-[1.2em]">

                                    </h1>

                                    <h1 class="z-10 font-bold font-Poppin group-hover:text-white duration-500 ">
                                        {{$festival->festival_naam}} gaat op {{$festival->festival_datum}} van start in {{$festival->festival_locatie}}
                                    </h1>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="pagination">  {{$busritten->appends(['busritten' => $busritten->currentpage()])->links()}}</div>

                </div>
            </div>


        </div>
    </div>

</x-guest-layout>
