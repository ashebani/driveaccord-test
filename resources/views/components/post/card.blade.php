@props(['post'])

<article
    wire:key="{{$post->id}}"
    class="rounded-xl border-2 relative dark:border-gray-700 bg-white dark:bg-gray-900 {{$post->solution_comment_id ? 'border-green-700 dark:border-green-700 dark:border-2' : ''}}">

    <div class="flex gap-1 absolute top-2 right-1/2 translate-x-1/2">
        @forelse($post->tags as $tag)
            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 hover:scale-[103%] transition-all">{{$tag->name}}</span>
        @empty
        @endforelse
    </div>
    <div class=" p-4 pt-5 md:p-6">
        <div class="flex justify-between items-start gap-4">


            <div class="flex items-start gap-4">

                <x-image-card :user="$post->user"/>

                <div>
                    <h3 class="font-medium sm:text-lg">
                        <a
                            href="/posts/{{$post->id}}"
                            class="hover:underline">{{$post->title}}
                        </a>
                    </h3>

                    <p class="line-clamp-2 text-sm text-gray-700 dark:text-gray-300">
                        {!!  strip_tags($post->description) !!}
                    </p>

                    <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                        <p class="hidden sm:block sm:text-xs sm:text-gray-500 dark:text-gray-400">
                            Posted by
                            <a
                                href="{{$post->user->route()}}"
                                class="font-medium underline hover:text-gray-700 ">{{$post->user->name}}
                            </a>
                        </p>
                        <span
                            class="hidden sm:block"
                            aria-hidden="true">&middot;</span>
                        <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400">
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
                        <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400">
                            <svg
                                width="1.5em"
                                height="1.5em"
                                class="fill-gray-500 dark:fill-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 32 32">
                                <path

                                    d="M 16 8 C 13.250421 8 11 10.250421 11 13 C 11 14.515649 11.706976 15.862268 12.78125 16.78125 C 11.713282 17.341324 10.782864 18.182903 10.125 19.1875 C 9.7680325 18.670371 9.3015664 18.196343 8.78125 17.84375 C 9.5247394 17.116062 10 16.114227 10 15 C 10 12.802706 8.1972944 11 6 11 C 3.8027056 11 2 12.802706 2 15 C 2 16.114227 2.4752606 17.116062 3.21875 17.84375 C 1.8879616 18.745561 1 20.284091 1 22 L 3 22 C 3 20.345455 4.3454545 19 6 19 C 7.6545455 19 9 20.345455 9 22 L 9 23 L 11 23 C 11 20.245455 13.245455 18 16 18 C 18.754545 18 21 20.245455 21 23 L 23 23 L 23 22 C 23 20.345455 24.345455 19 26 19 C 27.654545 19 29 20.345455 29 22 L 31 22 C 31 20.284091 30.112038 18.745561 28.78125 17.84375 C 29.524739 17.116062 30 16.114227 30 15 C 30 12.802706 28.197294 11 26 11 C 23.802706 11 22 12.802706 22 15 C 22 16.114227 22.475261 17.116062 23.21875 17.84375 C 22.698434 18.196343 22.231967 18.670371 21.875 19.1875 C 21.217136 18.182903 20.286718 17.341324 19.21875 16.78125 C 20.293024 15.862268 21 14.515649 21 13 C 21 10.250421 18.749579 8 16 8 z M 16 10 C 17.668699 10 19 11.331301 19 13 C 19 14.668699 17.668699 16 16 16 C 14.331301 16 13 14.668699 13 13 C 13 11.331301 14.331301 10 16 10 z M 6 13 C 7.116414 13 8 13.883586 8 15 C 8 16.116414 7.116414 17 6 17 C 4.883586 17 4 16.116414 4 15 C 4 13.883586 4.883586 13 6 13 z M 26 13 C 27.116414 13 28 13.883586 28 15 C 28 16.116414 27.116414 17 26 17 C 24.883586 17 24 16.116414 24 15 C 24 13.883586 24.883586 13 26 13 z"

                                />
                            </svg>


                            <p class="text-xs dark:text-gray-400">{{App\Helpers\makePlural('Contribution', $post->comments->unique('user_id')->count())}}</p>
                            <span
                                class="hidden sm:block"
                                aria-hidden="true">&middot;</span>
                            <p class="text-xs dark:text-gray-400 ">{{$post->created_at->diffForHumans()}}</p>

                        </div>


                    </div>
                </div>

            </div>

            <div class="text-right flex gap-2 justify-end">

                <div class="flex space-x-1 bg-white dark:bg-transparent items-center p-1 rounded">

                    <!-- Save Button -->
                    <x-bookmark :model="$post"/>
                </div>


            </div>
        </div>

    </div>

    {{--Solved Tag--}}
    @if($post->solution_comment_id)

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
