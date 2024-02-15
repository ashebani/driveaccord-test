@props(['comment', 'solution_comment_id'])

<div
    @cloak

    x-data="{ isOpen: false }">
    <div
        class="flex">
        <div class="ml-16 w-full rounded-xl self-start border-2 border-gray-100 bg-white dark:bg-gray-900{{$solution_comment_id == $comment->id ? 'border-green-700' : ''}} ">
            <div class="gap-4 p-4 sm:p-4 lg:p-6">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <img
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                            class="h-12 w-12 rounded-lg object-cover"
                            alt="contributer">
                    </div>
                    <div class="w-full">
                        <h3 class="text-sm font-semibold">{{$comment->user->name}}</h3>
                        <p class="text-xs text-gray-600">Posted
                            at {{date_format($comment->created_at, 'g:i A')}}</p>
                    </div>
                    <div class="flex space-x-1 bg-white items-center p-1 rounded">
                        @if(! $solution_comment_id)
                            <div
                                @cloak
                                class="relative"
                                x-data="{ isOpen: false }">

                                <div>
                                    <button
                                        @mouseover="isOpen = true"
                                        @mouseleave="isOpen = false"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-comment-solution-{{$comment->id}}')"
                                        class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
                                        <svg
                                            fill="#00b32d"
                                            width="1.5em"
                                            height="1.5em"
                                            viewBox="0 0 200 200"
                                            data-name="Layer 1"
                                            id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            stroke="#00b32d">
                                            <g
                                                id="SVGRepo_bgCarrier"
                                                stroke-width="0"></g>
                                            <g
                                                id="SVGRepo_tracerCarrier"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title></title>
                                                <path d="M177.6,80.43a10,10,0,1,0-19.5,4.5,60.76,60.76,0,0,1-6,44.5c-16.5,28.5-53.5,38.5-82,22-28.5-16-38.5-53-22-81.5s53.5-38.5,82-22a9.86,9.86,0,1,0,10-17c-38.5-22.5-87-9.5-109.5,29a80.19,80.19,0,1,0,147,20.5Zm-109.5,11a10.12,10.12,0,0,0-11,17l40,25a10.08,10.08,0,0,0,5.5,1.5,10.44,10.44,0,0,0,8-4l52.5-67.5c3.5-4.5,2.5-10.5-2-14s-10.5-2.5-14,2l-47,60Z"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <x-modal
                                        name="confirm-comment-solution-{{$comment->id}}"
                                    >

                                        <form
                                            method="post"
                                            action="/comments/{{$comment->id}}/comments/solution"
                                            class="p-6">
                                            @csrf

                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ __('Mark your issue as solved!') }}
                                            </h2>

                                            <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Enter your issue solution so others can learn from it.') }}
                                            </p>

                                            <div class="mt-6 flex justify-end">

                                                <x-primary-button class="ms-3">
                                                    {{ __('Mark as solved') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </div>
                                <div
                                    x-show="isOpen"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95"
                                    class="absolute flex items-center justify-center p-3 text-gray-600 -translate-x-1/2 -bottom-12 left-1/2 bg-gray-700 shadow-md mt-2 px-4 py-2 rounded-lg">

                                    <p class="text-white overflow-visible whitespace-nowrap">
                                        Mark as Solved
                                    </p>
                                </div>

                            </div>
                        @endif
                        <!-- Delete Button -->
                        <x-comment.delete-form :comment="$comment"/>
                        <!-- Bookmark Button -->
                        <x-bookmark :bookmarkable_model="$comment"/>
                        <!-- Helpful Button -->
                        <x-helpful :likeable_model="$comment"/>

                        <div
                            x-data="{ isDropdownOpen: false }"
                            class="relative inline-block ">
                            <!-- Dropdown toggle button -->
                            <button
                                @cloak
                                x-on:click="isDropdownOpen = !isDropdownOpen"
                                @click.away="isDropdownOpen = false"
                                class="relative z-10 block p-2 text-gray-700 bg-white border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div
                                x-show="isDropdownOpen"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800"
                            >
                                <a
                                    href="#"
                                    class="flex items-center px-3 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg
                                        class="w-5 h-5 mx-1"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z"
                                            fill="currentColor"></path>
                                    </svg>

                                    <span class="mx-1">
                view profile
            </span>
                                </a>

                                <a
                                    href="#"
                                    class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg
                                        class="w-5 h-5 mx-1"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0269 5.088C16.2739 5.23081 16.5126 5.38739 16.7419 5.557L18.5799 4.972C19.0276 4.82967 19.514 5.01816 19.7489 5.425L21.5689 8.578C21.8013 8.98548 21.7213 9.49951 21.3759 9.817L19.9509 11.117C20.0157 11.7059 20.0157 12.3001 19.9509 12.889L21.3759 14.189C21.7213 14.5065 21.8013 15.0205 21.5689 15.428L19.7489 18.581C19.514 18.9878 19.0276 19.1763 18.5799 19.034L16.7419 18.449C16.5093 18.6203 16.2677 18.7789 16.0179 18.924C15.7557 19.0759 15.4853 19.2131 15.2079 19.335L14.7959 21.214C14.6954 21.6726 14.2894 21.9996 13.8199 22ZM7.61992 16.229L8.43992 16.829C8.62477 16.9652 8.81743 17.0904 9.01692 17.204C9.20462 17.3127 9.39788 17.4115 9.59592 17.5L10.5289 17.909L10.9859 20H13.0159L13.4729 17.908L14.4059 17.499C14.8132 17.3194 15.1998 17.0961 15.5589 16.833L16.3799 16.233L18.4209 16.883L19.4359 15.125L17.8529 13.682L17.9649 12.67C18.0141 12.2274 18.0141 11.7806 17.9649 11.338L17.8529 10.326L19.4369 8.88L18.4209 7.121L16.3799 7.771L15.5589 7.171C15.1997 6.90671 14.8132 6.68175 14.4059 6.5L13.4729 6.091L13.0159 4H10.9859L10.5269 6.092L9.59592 6.5C9.39772 6.58704 9.20444 6.68486 9.01692 6.793C8.81866 6.90633 8.62701 7.03086 8.44292 7.166L7.62192 7.766L5.58192 7.116L4.56492 8.88L6.14792 10.321L6.03592 11.334C5.98672 11.7766 5.98672 12.2234 6.03592 12.666L6.14792 13.678L4.56492 15.121L5.57992 16.879L7.61992 16.229ZM11.9959 16C9.78678 16 7.99592 14.2091 7.99592 12C7.99592 9.79086 9.78678 8 11.9959 8C14.2051 8 15.9959 9.79086 15.9959 12C15.9932 14.208 14.2039 15.9972 11.9959 16ZM11.9959 10C10.9033 10.0011 10.0138 10.8788 9.99815 11.9713C9.98249 13.0638 10.8465 13.9667 11.9386 13.9991C13.0307 14.0315 13.9468 13.1815 13.9959 12.09V12.49V12C13.9959 10.8954 13.1005 10 11.9959 10Z"
                                            fill="currentColor"></path>
                                    </svg>

                                    <span class="mx-1">
                Settings
            </span>
                                </a>

                                <a
                                    href="#"
                                    class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg
                                        class="w-5 h-5 mx-1"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21 19H3C1.89543 19 1 18.1046 1 17V16H3V7C3 5.89543 3.89543 5 5 5H19C20.1046 5 21 5.89543 21 7V16H23V17C23 18.1046 22.1046 19 21 19ZM5 7V16H19V7H5Z"
                                            fill="currentColor"></path>
                                    </svg>

                                    <span class="mx-1">
                Keyboard shortcuts
            </span>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4"/>

                <p class="text-sm mt-4 text-gray-800 dark:text-gray-200">{{$comment->body}}</p>
                @auth()
                    <button
                        type="button"
                        x-on:click="isOpen = !isOpen"
                        class="text-gray-800 dark:text-gray-900 dark:hover:text-white dark:bg-white dark:hover:bg-gray-900 text-sm  hover:bg-gray-200 font-semibold p-2 mt-2 rounded transition-colors duration-300">
                        Reply
                    </button>
                @endauth
            </div>
        </div>
    </div>
    <div class="relative">

        <div class="absolute h-full w-[1px] bg-gray-300 left-24"></div>

        @foreach($comment->comments as $commentOfComment)
            <div

                class=" ml-32 mt-4 rounded-xl self-start border-2 border-gray-100 bg-white">
                <div class="mt-4 gap-4 p-4 sm:p-4 lg:p-6">

                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <img
                                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                                class="h-12 w-12 rounded-lg object-cover"
                                alt="contributer">
                        </div>
                        <div class="w-full">
                            <h3 class="text-sm font-semibold">{{$commentOfComment->user->name}}</h3>
                            <p class="text-xs text-gray-600">Posted
                                at {{date_format($commentOfComment->created_at, 'g:i A')}}</p>
                        </div>
                    </div>

                    <hr class="my-4"/>

                    <p class="text-sm mt-4 text-gray-800">{{$commentOfComment->body}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div
        class="ml-32 mt-4"
        x-show="isOpen"
    >

        @auth()
            {{--Comment Input--}}
            <form
                action="/comments/{{$comment->id}}/comments"
                method="POST">
                @csrf
                <x-form.textarea
                    name="body"
                    placeholder="Add a reply..."/>

                <x-form.input-error :messages="$errors->addComment->get('body')"/>

                <x-primary-button class="mt-2">Add</x-primary-button>
            </form>
        @endauth
    </div>


</div>

