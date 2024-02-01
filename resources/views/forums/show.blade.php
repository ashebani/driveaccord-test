@php use Illuminate\Support\Str;use function App\Helpers\makePlural; @endphp
<x-app-layout>
    <x-slot name="header">
        <nav
            class="ml-2"
            aria-label="Breadcrumb">
            <ol class="flex items-center gap-1 text-sm text-gray-600">
                <li>
                    <a
                        href="/home"
                        class="block transition hover:text-gray-700">
                        <span class="sr-only"> Home </span>

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                    </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </li>

                <li>
                    <a
                        href="/posts"
                        class="block transition hover:text-gray-700"> Posts
                    </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </li>

                <li class="block transition hover:text-gray-700">

                    {{Str::limit($post->title, 80)}}

                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    {{-- Main Post --}}
                    <article class="rounded-xl border-2 border-gray-100 bg-white">
                        <div class="grid items-start gap-4 p-4 sm:p-6 lg:p-8">
                            <div class="flex items-center gap-3">
                                <img
                                    alt="Speaker"
                                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                                    class="h-14 w-14 rounded-lg object-cover"
                                />
                                <div>

                                    <p class="text-lg ">
                                        {{--TODO:: add user id--}}
                                        <a href="/users/">{{$post->user->name}}</a>
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        Joined {{date_format($post->user->created_at, 'd M Y')}}
                                    </p>
                                </div>
                            </div>

                            <div class="grid">
                                <div class="flex items-center justify-between">
                                    <h2 class="font-medium  sm:text-2xl">
                                        {{$post->title}}

                                    </h2>

                                </div>

                                <div class="sm:flex sm:items-center sm:justify-between mt-2">
                                    <div class=" sm:flex sm:items-center sm:gap-2">
                                        <div class="flex items-center gap-1 text-gray-500">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                                                />
                                            </svg>

                                            <p class="text-xs">{{App\Helpers\makePlural('Comment', $post->comments->count())}}</p>
                                        </div>

                                        <span
                                            class="hidden sm:block"
                                            aria-hidden="true">&middot;</span>

                                        <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                            Posted at
                                            <span> 12 am</span>
                                        </p>
                                    </div>

                                    <p class="hidden sm:block sm:text-xs sm:text-gray-500 sm:text-right sm:justify-self-end">
                                        Last Updated {{date_format($post->updated_at, 'd M Y')}}
                                    </p>

                                </div>

                                <hr class="my-4"/>

                                <p class="line-clamp-2 text-md text-gray-700">
                                    {{$post->description}}
                                </p>

                            </div>
                            <div class="flex items-center justify-between flex-row-reverse">


                                @auth()
                                    <div class="text-right flex gap-2 justify-end">
                                        <div class="flex space-x-1 bg-white items-center p-1 rounded">
                                            <!-- Star Button -->
                                            <div
                                                @cloak
                                                class="relative"
                                                x-data="{ isOpen: false }">

                                                <form
                                                    action="/posts/{{$post->id}}/save"
                                                    method="post">
                                                    @csrf

                                                    <button
                                                        @mouseover="isOpen = true"
                                                        @mouseleave="isOpen = false"
                                                        class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
                                                        @if(auth()->user()->favorites->contains($post->id))
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

                                                        <p class="text-white">Save</p>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Useful Button -->
                                            <div
                                                class="relative"
                                                x-data="{ isOpen: false }">
                                                <form
                                                    action="/posts/{{$post->id}}/like"
                                                    method="post">
                                                    @csrf
                                                    <button
                                                        @mouseover="isOpen = true"
                                                        @mouseleave="isOpen = false"
                                                        class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
                                                        @if(auth()->user()->likes->contains($post->id))
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

                                                    <p class="text-white whitespace-nowrap">Mark as Useful</p>
                                                </div>
                                            </div>
                                            {{makePlural('person', $post->likes()->count())}}
                                            <p>
                                                found this helpful
                                            </p>

                                        </div>


                                    </div>
                                @endauth

                                @can('delete', $post)
                                    <div>


                                        <button
                                            class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300"
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')"
                                        >
                                            <svg

                                                xmlns="http://www.w3.org/2000/svg"
                                                x="0px"
                                                y="0px"
                                                class="fill-red-600"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 48 48">
                                                <path d="M 24 4 C 20.491685 4 17.570396 6.6214322 17.080078 10 L 10.238281 10 A 1.50015 1.50015 0 0 0 9.9804688 9.9785156 A 1.50015 1.50015 0 0 0 9.7578125 10 L 6.5 10 A 1.50015 1.50015 0 1 0 6.5 13 L 8.6386719 13 L 11.15625 39.029297 C 11.427329 41.835926 13.811782 44 16.630859 44 L 31.367188 44 C 34.186411 44 36.570826 41.836168 36.841797 39.029297 L 39.361328 13 L 41.5 13 A 1.50015 1.50015 0 1 0 41.5 10 L 38.244141 10 A 1.50015 1.50015 0 0 0 37.763672 10 L 30.919922 10 C 30.429604 6.6214322 27.508315 4 24 4 z M 24 7 C 25.879156 7 27.420767 8.2681608 27.861328 10 L 20.138672 10 C 20.579233 8.2681608 22.120844 7 24 7 z M 11.650391 13 L 36.347656 13 L 33.855469 38.740234 C 33.730439 40.035363 32.667963 41 31.367188 41 L 16.630859 41 C 15.331937 41 14.267499 40.033606 14.142578 38.740234 L 11.650391 13 z M 20.476562 17.978516 A 1.50015 1.50015 0 0 0 19 19.5 L 19 34.5 A 1.50015 1.50015 0 1 0 22 34.5 L 22 19.5 A 1.50015 1.50015 0 0 0 20.476562 17.978516 z M 27.476562 17.978516 A 1.50015 1.50015 0 0 0 26 19.5 L 26 34.5 A 1.50015 1.50015 0 1 0 29 34.5 L 29 19.5 A 1.50015 1.50015 0 0 0 27.476562 17.978516 z"></path>
                                            </svg>
                                        </button>

                                        <x-modal
                                            name="confirm-post-deletion"
                                        >

                                            <form
                                                method="post"
                                                action="/posts/{{$post->id}}"
                                                class="p-6">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Are you sure you want to delete your post?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    {{ __('Once your post is deleted, all of its resources and data will be permanently deleted.') }}
                                                </p>


                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Delete Post') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </x-modal>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </article>

                    {{-- Replies --}}
                    <article class=" space-y-4">
                        @forelse($post->comments as $comment)
                            <x-comment.card :comment="$comment"/>
                        @empty
                        @endforelse
                        <x-comment.create-form :post="$post"/>
                    </article>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


