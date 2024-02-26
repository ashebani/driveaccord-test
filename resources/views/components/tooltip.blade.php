@props(['model', 'function'])

@auth
    <div
        @cloak
        class="relative"
        x-data="{ isOpen: false }">
        <button
            type="button"
            wire:click="{{$function}}({{$model->id}})"
            @mouseover="isOpen = true"
            @mouseleave="isOpen = false"
            class="text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold p-2 rounded transition-colors duration-300">
            {{$buttonIcon}}
        </button>
        <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute flex items-center justify-center p-3 text-gray-600 -translate-x-1/2 -bottom-12 left-1/2 bg-gray-700 shadow-md mt-2 px-4 py-2 rounded-lg">
            <p class="text-white whitespace-nowrap">
                {{$text}}
            </p>
        </div>
    </div>
@endauth
