<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-lg font-bold">Festival Travel Systems </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('Busreizen.index') }}" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Busreizen</a>
                        <a href="{{ route('Festival.index') }}" class="text-gray-900 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Festivals</a>
                    </div>
                </div>
            </div>
            <div class="hidden sm:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Authentication Links -->
                    @if (Auth::check())
                        <span class="text-gray-900">{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" class="ml-4 text-sm text-gray-700">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</nav>
