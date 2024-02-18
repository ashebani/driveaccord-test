<x-app-layout>
    <x-slot name="header">
        <nav
            class="ml-2"
            aria-label="Breadcrumb">
            <ol class="flex items-center gap-1 text-sm text-gray-600">
                <li>
                    <a
                        href="/home"
                        class="block transition hover:text-gray-700 dark:text-white dark:hover:text-gray-400">
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
                        class="h-4 w-4 dark:text-white dark:hover:text-gray-400"
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
                        class="block transition hover:text-gray-700 dark:text-white dark:hover:text-gray-400"> Posts
                    </a>
                </li>

            </ol>
        </nav>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 grid">
            {{--        <div class="flex justify-between items-center">--}}

            {{--            <div class="flex items-center gap-2">--}}

            {{--                --}}{{--    Search Bar    --}}
            {{--                <div class="relative">--}}
            {{--                    <input--}}
            {{--                        wire:model.live="search"--}}
            {{--                        type="text"--}}
            {{--                        placeholder="Search for..."--}}
            {{--                        class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"--}}
            {{--                    />--}}

            {{--                    <div class="absolute inset-y-0 end-0 grid w-10 place-content-center">--}}
            {{--                        <button--}}
            {{--                            type="button"--}}
            {{--                            class="text-gray-600 hover:text-gray-700">--}}
            {{--                            <span class="sr-only">Search</span>--}}

            {{--                            <svg--}}
            {{--                                xmlns="http://www.w3.org/2000/svg"--}}
            {{--                                fill="none"--}}
            {{--                                viewBox="0 0 24 24"--}}
            {{--                                stroke-width="1.5"--}}
            {{--                                stroke="currentColor"--}}
            {{--                                class="h-4 w-4"--}}
            {{--                            >--}}
            {{--                                <path--}}
            {{--                                    stroke-linecap="round"--}}
            {{--                                    stroke-linejoin="round"--}}
            {{--                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"--}}
            {{--                                />--}}
            {{--                            </svg>--}}
            {{--                        </button>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                --}}{{--    Sort    --}}
            {{--                <select--}}
            {{--                    id="countries"--}}
            {{--                    class="bg-gray-50 border w-28 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
            {{--                    <option selected>Sort By</option>--}}
            {{--                    <option--}}
            {{--                        wire:click="sortBy('asc')"--}}
            {{--                        value="Newest">Newest--}}
            {{--                    </option>--}}
            {{--                    <option--}}
            {{--                        wire:click="sortBy('desc')"--}}
            {{--                        value="Oldest">Oldest--}}
            {{--                    </option>--}}
            {{--                </select>--}}

            {{--                --}}{{--    Solved Checkbox    --}}
            {{--                <div class="inline-flex items-center">--}}
            {{--                    <label--}}
            {{--                        class="relative flex cursor-pointer items-center rounded-full p-3"--}}
            {{--                        for="checkbox-1"--}}
            {{--                        data-ripple-dark="true"--}}
            {{--                    >--}}

            {{--                        <input--}}
            {{--                            type="checkbox"--}}
            {{--                            wire:click="toggleSolved()"--}}
            {{--                            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 hover:before:opacity-10"--}}
            {{--                            id="checkbox-1"--}}

            {{--                        />--}}
            {{--                        <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">--}}
            {{--                            <svg--}}
            {{--                                xmlns="http://www.w3.org/2000/svg"--}}
            {{--                                class="h-3.5 w-3.5"--}}
            {{--                                viewBox="0 0 20 20"--}}
            {{--                                fill="currentColor"--}}
            {{--                                stroke="currentColor"--}}
            {{--                                stroke-width="1"--}}
            {{--                            >--}}
            {{--                                <path--}}
            {{--                                    fill-rule="evenodd"--}}
            {{--                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"--}}
            {{--                                    clip-rule="evenodd"--}}
            {{--                                ></path>--}}
            {{--                            </svg>--}}
            {{--                        </div>--}}
            {{--                    </label>--}}
            {{--                    <p class="text-sm dark:text-gray-200">Solved only</p>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <x-post.create-form/>--}}

            {{--        </div>--}}

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">

                    @forelse($posts as $post)
                        <x-post.card
                            :post="$post"/>

                    @empty
                        {{ __("No posts here yet.") }}
                    @endforelse
                    {{--                {{$posts->links()}}--}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
