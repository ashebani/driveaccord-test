@props(['saveable_data'])

@php
    use Illuminate\Support\Str;
    use function App\Helpers\getLastSegment;
	use function App\Helpers\makePlural;
        $className = getLastSegment($saveable_data::class);
        $route = "/" . Str::plural(strtolower($className)) . '/' . $saveable_data->id;
        $isSaved = $saveable_data->bookmarks()->where('user_id' , auth()->id())->exists();
        $isMarkedAsHelpful = $saveable_data->likes()->where('user_id' , auth()->id())->exists();
@endphp

@auth
    <div class="text-right flex gap-2 justify-end">
        <div class="flex space-x-1 bg-white items-center p-1 rounded">
            <!-- Save Button -->
            <div
                @cloak
                class="relative"
                x-data="{ isOpen: false }">

                <form
                    action="{{$route . '/save'}}"
                    method="post">
                    @csrf

                    <button
                        @mouseover="isOpen = true"
                        @mouseleave="isOpen = false"
                        class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
                        @if($isSaved)
                            <svg
                                width="1.5em"
                                height="1.5em"
                                fill="#000000"
                                viewBox="-5 -2 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMinYMin"
                                class="jam jam-bookmark-f">
                                <g
                                    id="SVGRepo_bgCarrier"
                                    stroke-width="0"></g>
                                <g
                                    id="SVGRepo_tracerCarrier"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M3 0h8a3 3 0 0 1 3 3v15a2 2 0 0 1-3.348 1.477L7.674 16.76a1 1 0 0 0-1.348 0l-2.978 2.717A2 2 0 0 1 0 18V3a3 3 0 0 1 3-3z"></path>
                                </g>
                            </svg>
                        @else
                            <svg
                                width="1.5em"
                                height="1.5em"
                                fill="#000000"
                                viewBox="-5 -2 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMinYMin"
                                class="jam jam-bookmark">
                                <g
                                    id="SVGRepo_bgCarrier"
                                    stroke-width="0"></g>
                                <g
                                    id="SVGRepo_tracerCarrier"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M3 2a1 1 0 0 0-1 1v15l2.978-2.717a3 3 0 0 1 4.044 0L12 18V3a1 1 0 0 0-1-1H3zm0-2h8a3 3 0 0 1 3 3v15a2 2 0 0 1-3.348 1.477L7.674 16.76a1 1 0 0 0-1.348 0l-2.978 2.717A2 2 0 0 1 0 18V3a3 3 0 0 1 3-3z"></path>
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

                        <p class="text-white">{{$isSaved? 'Unsave' : 'Save'}}</p>
                    </div>
                </form>
            </div>

            <!-- Helpful 'Like' Button -->
            @if(auth()->id() !== $saveable_data->user_id)

                <div
                    class="relative"
                    x-data="{ isOpen: false }">
                    <form
                        action="{{$route . '/like'}}"
                        method="post">
                        @csrf
                        <button
                            @mouseover="isOpen = true"
                            @mouseleave="isOpen = false"
                            class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
                            @if($isMarkedAsHelpful)
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
                    </form>

                    <div
                        x-show="isOpen"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute flex items-center justify-center p-3 text-gray-600 -translate-x-1/2 -bottom-12 left-1/2 bg-gray-700 shadow-md mt-2 px-4 py-2 rounded-lg">

                        <p class="text-white whitespace-nowrap">{{$isMarkedAsHelpful? 'Remove Marked As Helpful' : 'Mark As Helpful'}}</p>
                    </div>
                </div>
                {{--                <p class="whitespace-nowrap">--}}
                {{--                    {{makePlural('person', $saveable_data->likes->count())}}--}}
                {{--                    found this helpful--}}
                {{--                </p>--}}
            @endif

        </div>


    </div>
@endauth
