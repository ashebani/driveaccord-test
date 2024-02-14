@props(['likeable_model'])

@auth()
    <div
        @cloak
        class="relative"
        x-data="{ isOpen: false }">
        <button
            type="button"
            wire:click="helpful({{$likeable_model->id}})"
            @mouseover="isOpen = true"
            @mouseleave="isOpen = false"
            class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
            @if($likeable_model->likes->contains('user_id', auth()->id()))
                <svg
                    width="1.5em"
                    height="1.5em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="fill-yellow-200"
                    xmlns="http://www.w3.org/2000/svg">
                    <g
                        id="SVGRepo_bgCarrier"
                        stroke-width="0"></g>
                    <g
                        id="SVGRepo_tracerCarrier"
                        stroke-linecap="round"
                        stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12 7C9.23858 7 7 9.23858 7 12C7 13.3613 7.54402 14.5955 8.42651 15.4972C8.77025 15.8484 9.05281 16.2663 9.14923 16.7482L9.67833 19.3924C9.86537 20.3272 10.6862 21 11.6395 21H12.3605C13.3138 21 14.1346 20.3272 14.3217 19.3924L14.8508 16.7482C14.9472 16.2663 15.2297 15.8484 15.5735 15.4972C16.456 14.5955 17 13.3613 17 12C17 9.23858 14.7614 7 12 7Z"
                            stroke="#000000"
                            stroke-width="2"></path>
                        <path
                            d="M12 4V3"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M18 6L19 5"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M20 12H21"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M4 12H3"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M5 5L6 6"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M10 17H14"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>
            @else
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    height="1.5em"
                    width="1.5em"
                    xmlns="http://www.w3.org/2000/svg">
                    <g
                        id="SVGRepo_bgCarrier"
                        stroke-width="0"></g>
                    <g
                        id="SVGRepo_tracerCarrier"
                        stroke-linecap="round"
                        stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12 7C9.23858 7 7 9.23858 7 12C7 13.3613 7.54402 14.5955 8.42651 15.4972C8.77025 15.8484 9.05281 16.2663 9.14923 16.7482L9.67833 19.3924C9.86537 20.3272 10.6862 21 11.6395 21H12.3605C13.3138 21 14.1346 20.3272 14.3217 19.3924L14.8508 16.7482C14.9472 16.2663 15.2297 15.8484 15.5735 15.4972C16.456 14.5955 17 13.3613 17 12C17 9.23858 14.7614 7 12 7Z"
                            stroke="#000000"
                            stroke-width="2"></path>
                        <path
                            d="M10 17H14"
                            stroke="#000000"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>
            @endif

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

            <p class="text-white whitespace-nowrap">{{$likeable_model->likes->contains('user_id' , auth()->id())? 'Unmark As Helpful' : 'Mark As Helpful'}}</p>
        </div>
    </div>
@endauth
