@props(['name'])

<div class="flex space-x-1 bg-white items-center p-1 rounded">
    <div
        class="relative"
        x-data="{ isOpen: false }">

        <button
            @mouseover="isOpen = true"
            @mouseleave="isOpen = false"
            class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">

        </button>
        {{$slot}}
        <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute p-3 text-center text-gray-600 -translate-x-1/2 -bottom-12 left-1/2 bg-gray-700 shadow-md mt-2 px-4 py-2 rounded-lg">
            <p class="text-white text-center">{{$name}}</p>
        </div>
    </div>

</div>
