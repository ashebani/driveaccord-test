<x-app-layout>


    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 grid">
            <div class="flex">
                <form
                    action="/favorites"
                    method="GET"
                >

                    <div class="relative">
                        <label
                            for="Search"
                            class="sr-only"> Search
                        </label>

                        <input
                            type="text"
                            id="Search"
                            name="search"
                            placeholder="Search for..."
                            class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"
                        />

                        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
    <button
        type="button"
        class="text-gray-600 hover:text-gray-700">
      <span class="sr-only">Search</span>

      <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="h-4 w-4"
      >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
        />
      </svg>
    </button>
  </span>
                    </div>


                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">

                    @forelse($posts as $post)

                        <article class="rounded-xl border-2 bg-white {{$post->solved ? 'border-green-700' : ''}} ">
                            <div class="flex justify-between items-start gap-4 p-4 sm:p-6 lg:p-8">
                                <div class="flex items-start gap-4">

                                    <a
                                        href="#"
                                        class="block shrink-0">
                                        <img
                                            alt="Speaker"
                                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                                            class="h-14 w-14 rounded-lg object-cover"
                                        />
                                    </a>
                                    <div>
                                        <h3 class="font-medium sm:text-lg">
                                            <a
                                                href="/posts/{{$post->id}}"
                                                class="hover:underline">{{$post->title}}
                                            </a>
                                        </h3>

                                        <p class="line-clamp-2 text-sm text-gray-700">
                                            {{$post->description}}
                                        </p>

                                        <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                            <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                                Posted by
                                                <a
                                                    href="#"
                                                    class="font-medium underline hover:text-gray-700">{{$post->user->name}}
                                                </a>
                                            </p>
                                            <span
                                                class="hidden sm:block"
                                                aria-hidden="true">&middot;</span>
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

                                                <p class="text-xs">{{$post->comments->count() <= 1 ? $post->comments->count() . ' Comment' : $post->comments->count() . ' Comments' }}</p>
                                            </div>
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

                                                <p class="text-xs">{{$post->comments->count() <= 1 ? $post->comments->count() . ' Contribution' : $post->comments->count() - 2 . ' Contributions' }}</p>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="flex space-x-1 ml-7 bg-white items-center p-1 rounded">

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
                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        width="1.5em"
                                                        height="1.5em"
                                                        fill="none"
                                                        class="{{auth()->user()->favorites->contains($post->id) ? 'fill-yellow-200' : ''}}"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        stroke="#e9dc3a">
                                                        <g
                                                            id="SVGRepo_bgCarrier"
                                                            stroke-width="0"></g>
                                                        <g
                                                            id="SVGRepo_tracerCarrier"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke="#CCCCCC"
                                                            stroke-width="0.768"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M11.2691 4.41115C11.5006 3.89177 11.6164 3.63208 11.7776 3.55211C11.9176 3.48263 12.082 3.48263 12.222 3.55211C12.3832 3.63208 12.499 3.89177 12.7305 4.41115L14.5745 8.54808C14.643 8.70162 14.6772 8.77839 14.7302 8.83718C14.777 8.8892 14.8343 8.93081 14.8982 8.95929C14.9705 8.99149 15.0541 9.00031 15.2213 9.01795L19.7256 9.49336C20.2911 9.55304 20.5738 9.58288 20.6997 9.71147C20.809 9.82316 20.8598 9.97956 20.837 10.1342C20.8108 10.3122 20.5996 10.5025 20.1772 10.8832L16.8125 13.9154C16.6877 14.0279 16.6252 14.0842 16.5857 14.1527C16.5507 14.2134 16.5288 14.2807 16.5215 14.3503C16.5132 14.429 16.5306 14.5112 16.5655 14.6757L17.5053 19.1064C17.6233 19.6627 17.6823 19.9408 17.5989 20.1002C17.5264 20.2388 17.3934 20.3354 17.2393 20.3615C17.0619 20.3915 16.8156 20.2495 16.323 19.9654L12.3995 17.7024C12.2539 17.6184 12.1811 17.5765 12.1037 17.56C12.0352 17.5455 11.9644 17.5455 11.8959 17.56C11.8185 17.5765 11.7457 17.6184 11.6001 17.7024L7.67662 19.9654C7.18404 20.2495 6.93775 20.3915 6.76034 20.3615C6.60623 20.3354 6.47319 20.2388 6.40075 20.1002C6.31736 19.9408 6.37635 19.6627 6.49434 19.1064L7.4341 14.6757C7.46898 14.5112 7.48642 14.429 7.47814 14.3503C7.47081 14.2807 7.44894 14.2134 7.41394 14.1527C7.37439 14.0842 7.31195 14.0279 7.18708 13.9154L3.82246 10.8832C3.40005 10.5025 3.18884 10.3122 3.16258 10.1342C3.13978 9.97956 3.19059 9.82316 3.29993 9.71147C3.42581 9.58288 3.70856 9.55304 4.27406 9.49336L8.77835 9.01795C8.94553 9.00031 9.02911 8.99149 9.10139 8.95929C9.16534 8.93081 9.2226 8.8892 9.26946 8.83718C9.32241 8.77839 9.35663 8.70162 9.42508 8.54808L11.2691 4.41115Z"
                                                                stroke="#000000"
                                                                stroke-width="2"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
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

                                                    <p class="text-white">Unsave</p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Solved Tag--}}
                            <div class="flex justify-end">
                                <strong
                                    class="-mb-[2px] -me-[2px] inline-flex items-center gap-1 rounded-ee-xl rounded-ss-xl bg-green-600 px-3 py-1.5 text-white"
                                >
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
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                        />
                                    </svg>

                                    <span class="text-[10px] font-medium sm:text-xs">Solved!</span>
                                </strong>
                            </div>

                        </article>
                    @empty
                        {{ __("No saved posts here yet, start adding now!") }}
                        <a
                            href="/posts"
                            class="underline text-blue-600 hover:text-violet-900">Go to posts
                        </a>
                    @endforelse
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
