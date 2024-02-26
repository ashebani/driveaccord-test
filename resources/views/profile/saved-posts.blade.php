@php use Illuminate\Support\Str;use function App\Helpers\makePlural; @endphp
@props(['savedPosts'])

<div x-show="tab == '#saved-posts'">
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

            @forelse($savedPosts as $post)
                <article class="rounded-xl border-2 bg-white {{$post?->solution_comment_id ? 'border-green-700' : ''}} ">
                    <div class="flex justify-between items-start gap-4 p-4 sm:p-6 lg:p-8">
                        <div class="flex w-full items-start justify-between gap-4">
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

                                            <p class="text-xs">{{makePlural('Comment', $post->comments->count())}}</p>
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

                                            <p class="text-xs">{{$post->comments->unique('user_id')->count() . Str::plural(' Contribution', $post->comments->unique('user_id')->count())}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    {{--   Solved Tag--}}
                    @if($post?->solution_comment_id)
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

                    @endif
                </article>
                {{--                <x-post.card :post="$post"/>--}}
            @empty
                {{ __("No saved posts here yet, start adding now!") }}
                <a
                    href="/posts"
                    class="underline text-blue-600 hover:text-violet-900">Go to posts
                </a>
            @endforelse
            {{$savedPosts->links()}}
        </div>
    </div>
</div>
