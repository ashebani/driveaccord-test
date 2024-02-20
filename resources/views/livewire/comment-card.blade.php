@props(['comment', 'solution_comment_id'])

<div
    @cloak

    x-data="{ isOpen: false }">
    <div
        class="flex">
        <div class="ml-16 w-full rounded-xl self-start border-2 border-gray-100 bg-white dark:bg-gray-900 {{$solution_comment_id === $comment->id ? 'border-green-700' : ''}} ">
            <div class="gap-4 p-4 sm:p-4 lg:p-6">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <img
                            src="{{$comment->user->image_url}}"
                            class="h-12 w-12 rounded-lg object-cover"
                            alt="contributer">
                    </div>
                    <div class="w-full">
                        <a href="{{$comment->user->route()}}">
                            <h3 class="text-sm font-semibold">{{$comment->user->name}}</h3>
                        </a>
                        <p class="text-xs text-gray-600">Posted
                            at {{date_format($comment->created_at, 'g:i A')}}</p>
                    </div>
                    <div class="flex space-x-1 bg-white items-center p-1 rounded">
                        @if(! $solution_comment_id && auth()->id() === $comment->commentable->user->id )
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
                <div class=" gap-4 p-4 sm:p-4 lg:p-6">

                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <img
                                src="{{$commentOfComment->user->image_url}}"
                                class="h-12 w-12 rounded-lg object-cover"
                                alt="contributer">
                        </div>
                        <div class="w-full">
                            <a href="{{$commentOfComment->user->route()}}">

                                <h3 class="text-sm font-semibold">{{$commentOfComment->user->name}}</h3>
                            </a>
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

