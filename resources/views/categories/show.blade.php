<x-app-layout>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 grid">
            {{--        <div class="flex justify-between items-center">--}}

            {{--            <div class="flex items-center gap-2">--}}

            <livewire:search/>
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
