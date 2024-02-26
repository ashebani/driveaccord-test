<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="pb-12 pt-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div
                class="grid"
                x-data="{ tab: window.location.hash ? window.location.hash : '#account' }">

                <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md max-w-lg w-full justify-self-center">
                    <button
                        @click="tab = '#account'"
                        :class="{ 'bg-primary text-white': tab === '#account' }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                        Account
                    </button>
                    <button
                        @click="tab = '#my-posts'"
                        :class="{ 'bg-primary text-white': tab === '#my-posts' }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                        My Posts
                    </button>
                    <button
                        @click="tab = '#saved-posts'"
                        :class="{ 'bg-primary text-white': tab === '#saved-posts' }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                        Saved Posts
                    </button>
                </div>

                {{--Account Settings--}}
                @include('profile.account')

                {{--My Posts--}}
                <div
                    x-show="tab=='#my-posts'"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">

                        @forelse($userPosts as $post)
                            <article class="rounded-xl border-2 bg-white {{$post->solved ? 'border-green-700' : ''}}">
                                <div class="flex justify-between items-start gap-4 p-4 sm:p-6 lg:p-8">
                                    <div class="flex items-start gap-2">

                                        <div class="flex items-center gap-4 overflow-hidden">
                                            <h3 class="font-medium w-44 whitespace-nowrap overflow-ellipsis overflow-x-clip sm:text-lg">
                                                <a
                                                    href="/posts/{{$post->id}}"
                                                    class="hover:underline">{{$post->title}}
                                                </a>
                                            </h3>

                                            <p class="line-clamp-2 sm:max-w-xl md:max-w-80  text-sm text-gray-700">
                                                {{strip_tags($post->description)}}
                                            </p>


                                        </div>


                                    </div>
                                    <div class="flex justify-end items-center gap-2">

                                        <div class="mt-2 sm:flex sm:items-center sm:gap-2">

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


                                                <p class="text-xs">{{App\Helpers\makePlural('Contribution', $post->comments->unique('user_id')->count())}}</p>
                                            </div>

                                        </div>
                                        @if(!$post->solution_comment_id)
                                            <div
                                                @cloak
                                                class="relative"
                                                x-data="{ isOpen: false }">

                                                <div>
                                                    <button
                                                        @mouseover="isOpen = true"
                                                        @mouseleave="isOpen = false"
                                                        x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-comment-solution-{{$post->id}}')"
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
                                                        name="confirm-comment-solution-{{$post->id}}"
                                                    >

                                                        <form
                                                            method="post"
                                                            action="/posts/{{$post->id}}/comments/solution#my-posts"
                                                            class="p-6">
                                                            @csrf

                                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                                {{ __('Mark your issue as solved!') }}
                                                            </h2>

                                                            <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">
                                                                {{ __('Enter your issue solution so others can learn from it.') }}
                                                            </p>


                                                            <x-form.textarea
                                                                name="body"
                                                                placeholder="Describe your solution"/>
                                                            <x-form.input-error :messages="$errors->addComment->get('body')"/>
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
                                        <x-post.delete-form
                                            :post="$post"/>
                                    </div>
                                </div>
                                @if($post->solved)

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

                                @endif
                            </article>
                        @empty
                            {{ __("No posts here yet.") }}
                        @endforelse
                        {{$userPosts->links()}}
                    </div>
                </div>

                {{--Saved Posts--}}
                @include('profile.saved-posts', ['savedPosts'=>$savedPosts])


            </div>


        </div>
    </div>

</x-app-layout>
