<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- logo column-->
            <div class="flex">
                <!-- logo homepage link-->
                <a href="{{ url('/') }}" class="flex items-center text-xl font-bold text-blue-600">
                    <img src="/images/weather-icon.png" alt="linkedIn logo" width="50" height="0">
                </a>
            </div>
            <!-- navigation link column-->
            <div class="hidden md:flex space-x-4 items-center">
                <a href="https://google.com" class=" hover:text-blue-600">Google</a>
            </div>
            <!-- mobile menu button-->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="focus:outline-none focus:text-blue-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- mobile menu dropdown-->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
        <a href="https://google.com" target="_blank" class="block py-2 hover:text-blue-600">Google</a>
    </div>
</nav>