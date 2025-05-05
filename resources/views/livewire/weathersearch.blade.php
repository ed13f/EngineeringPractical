<div class="max-w-xl mx-auto mt-2 space-y-4">
    <div class="sm:flex justify-center gap-5">
        <div class="mt-3">
            <label class="block text-sm font-medium ">Latitude</label>
            <input
                wire:model.live="latitude"
                type="text"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                placeholder="e.g., 35.2383"
            />
        </div>
        <div class="mt-3">
            <label class="block text-sm font-medium ">Longitude</label>
            <input
                wire:model="longitude"
                type="text"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                placeholder="e.g., -80.7905"
            />
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <button wire:click="searchWeather" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" aria-label="Submit form">Search</button>
    </div>
    @if($error)
        <p class="text-center">{{$error}}</p>
    @endif
    @if($temperature || $condition || $humidity || $wind_speed)
        <div class="flex flex-col md:flex-row justify-center gap-8 my-6 max-w-lg mx-auto w-max">
            <!-- column 1 weather data -->
            <div class=" border-2 rounded-2xl border-gray-500 border-solid p-7 w-full text-center md:text-left">
                <p><span class="font-bold ">Current Temperature:</span> <span class="font-normal">{{$temperature ? $temperature : 'NA'}}</span></p>
                <p><span class="font-bold ">Current Condition:</span> <span class="font-normal">{{$condition ? $condition : "NA"}}</span></p>
            </div>
            <!-- column 2 weather data -->
            <div class=" border-2 rounded-2xl border-gray-500 border-solid p-7 w-full text-center md:text-left">
                <h2 class="font-extrabold">Additional Details</h2>
                <p><span class="font-bold">Humidity:</span> <span class="font-normal">{{$humidity ? $humidity : "NA"}}</span></p>
                <p><span class="font-bold">Wind Speed:</span> <span class="font-normal">{{$wind_speed ? $wind_speed : "NA"}}</span></p> 
            </div>
        </div>
    @endif

</div>
