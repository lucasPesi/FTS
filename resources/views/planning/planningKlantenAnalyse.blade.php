<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analyse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                        <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                            <div class="text-center md:border-r">
                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl mt-8">{{$werknemers}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    Werknemers in dienst!
                                </p>
                            </div>
                            <div class="text-center md:border-r">

                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl mt-8">{{$bussen}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    Aantal bussen!
                                </p>
                            </div>
                            <div class="text-center md:border-r">

                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl mt-8">{{$klanten}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    Aantal gebruikers
                                </p>
                            </div>
                            <div class="text-center">

                                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl mt-8">{{$busritten}}</h6>
                                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                                    ingeplande bussen!
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
