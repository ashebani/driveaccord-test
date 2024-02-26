@props(['model'])

<x-tooltip
    function="helpful"
    :model="$model">
    <x-slot name="buttonIcon">
        @if($model->likes->contains('user_id', auth()->id()))
            <svg
                class="fill-yellow-200 dark:fill-white text-white stroke-white"
                width="1.5em"
                height="1.5em"
                viewBox="0 0 24 24"
                fill="none"
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
                class="dark:fill-white"
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
    </x-slot>
    <x-slot name="text">
        {{$model->likes->contains('user_id' , auth()->id())? 'Unmark As Helpful' : 'Mark As Helpful'}}
    </x-slot>
</x-tooltip>
