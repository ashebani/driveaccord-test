@props(['bookmarkable_model', 'isSaved'])

@auth()
    <div
        @cloak
        class="relative"
        x-data="{ isOpen: false }">
        <button
            type="button"
            wire:click="bookmark({{$bookmarkable_model->id}})"
            @mouseover="isOpen = true"
            @mouseleave="isOpen = false"
            class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300 dark:bg-gray-900">
            @if($bookmarkable_model->bookmarks->contains(
            'user_id',
            auth()->id()
        ))
                <svg
                    width="1.5em"
                    height="1.5em"
                    fill="#000000"
                    viewBox="-5 -2 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMinYMin"
                    class="jam jam-bookmark-f dark:fill-white">
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
                    class="jam jam-bookmark dark:fill-white">
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

            <p class="text-white">{{$bookmarkable_model->bookmarks->contains('user_id' , auth()->id())? 'Unsave' : 'Save'}}</p>
        </div>
    </div>
@endauth
