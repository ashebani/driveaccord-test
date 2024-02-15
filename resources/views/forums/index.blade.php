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


            </ol>
        </nav>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 grid">
            <div class="flex justify-between items-center">

                <form
                    action="/posts"
                    method="GET"
                >
                    @if(request('orderBy'))
                        <input
                            type="hidden"
                            name="orderBy"
                            value="{{request()->input('orderBy')}}"
                        >
                    @endif

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
                            value="{{request()->has('search') ? request()->input('search') : ''}}"
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
                <div class="flex gap-2">
                    <p>Sort by:</p>
                    <a href="{{'?orderBy=newest'. '&' . http_build_query(request()->except('orderBy'))}}">newest
                    </a>
                    <a href="{{'?orderBy=oldest'. '&' . http_build_query(request()->except('orderBy'))}}">oldest
                    </a>
                </div>
                @auth()
                    <x-post.create-form/>
                @endauth
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">

                    @forelse($posts as $post)

                        <x-post.card :post="$post"/>
                    @empty
                        {{ __("No posts here yet.") }}
                    @endforelse
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
