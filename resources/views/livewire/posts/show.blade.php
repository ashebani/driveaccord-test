<x-slot name="header">
    <nav
        class="ml-2"
        aria-label="Bareadcrumb">
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
                <article class="rounded-xl border-2 border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-900">
                    <div class="grid items-start gap-4 p-4 sm:p-6 lg:p-8">
                        <div class="flex items-center gap-3">
                            <img
                                alt="Speaker"
                                src="{{$post->user->image_url}}"
                                class="h-14 w-14 rounded-lg object-cover"
                            />
                            <div>

                                <p class="text-lg ">
                                    <a href="{{$post->user->route()}}">{{$post->user->name}}</a>
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

                                        <p class="text-xs dark:text-gray-400">{{App\Helpers\makePlural('Comment', $post->comments->count())}}</p>
                                    </div>

                                    <span
                                        class="hidden sm:block"
                                        aria-hidden="true">&middot;</span>

                                    <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                        Posted at
                                        <span>{{date_format($post->created_at,'d M Y' )}}</span>
                                    </p>
                                </div>

                                <p class="hidden sm:block sm:text-xs sm:text-gray-500 sm:text-right sm:justify-self-end">
                                    Last Contribution {{$post->updated_at->diffForHumans()}}
                                </p>

                            </div>

                            <hr class="my-4 dark:border-gray-400"/>

                            <p class="line-clamp-2 text-md text-gray-700">
                                {!!  $post->description !!}
                            </p>

                        </div>
                        <div class="flex items-center justify-between flex-row-reverse">

                            @auth()
                                <div class="text-right flex gap-2 justify-end">
                                    <div class="flex space-x-1 bg-white items-center p-1 rounded">
                                        <!-- Bookmark Button -->
                                        <x-bookmark
                                            :bookmarkable_model="$post"
                                        />

                                        @if($post->user_id !== auth()->id())

                                            <!-- Helpful Button -->
                                            <x-helpful :likeable_model="$post"/>
                                        @endif

                                    </div>


                                </div>
                            @endauth

                            <x-post.delete-form :$post/>
                        </div>
                    </div>
                </article>

                {{-- Replies --}}
                <article
                    class=" space-y-4"
                    wire:ignore.self>
                    @forelse($comments as $comment)
                        <livewire:comment-card

                            wire:key="{{$comment->id}}"
                            :$comment
                            :solution_comment_id="$post->solution_comment_id"/>

                    @empty
                    @endforelse
                    {{$comments->links()}}
                    <x-comment.create-form :post="$post"/>
                </article>
            </div>
        </div>
    </div>
</div>


