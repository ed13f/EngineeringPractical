<x-layout> 
    <h1 class="text-4xl md:text-5xl text-center ">Weather Dashboard</h1> 
    <p class="my-6 text-center ">Enter your latitude and longitude to see your weather.</p>
    @persist('searchWeather')
    <livewire:Weathersearch />
    @endpersist
</x-layout>  