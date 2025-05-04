<x-layout> 
    <h1 class="text-4xl md:text-5xl text-center ">Weather Dashboard</h1> 
    <p class="my-6 text-center ">This is a starting point for your assignment.</p>
    @if($error)
        <p>{{$error}}</p>
    @else
        <div class="flex flex-col md:flex-row justify-center gap-8 my-6 max-w-lg mx-auto w-max">
            <!-- column 1 weather data -->
            <div class=" border-2 rounded-2xl border-gray-500 border-solid p-7 w-full text-center md:text-left">
                <p><span class="font-bold ">Current Temperature:</span> <span class="font-normal">{{$temperature}}</span></p>
                <p><span class="font-bold ">Current Condition:</span> <span class="font-normal">{{$condition}}</span></p>
            </div>
            <!-- column 2 weather data -->
            <div class=" border-2 rounded-2xl border-gray-500 border-solid p-7 w-full text-center md:text-left">
                <h2 class="font-extrabold">Additional Details</h2>
                <p><span class="font-bold">Humidity:</span> <span class="font-normal">{{$humidity}}</span></p>
                <p><span class="font-bold">Wind Speed:</span> <span class="font-normal">{{$wind_speed}}</span></p> 
            </div>
        </div>
    @endif
</x-layout>  