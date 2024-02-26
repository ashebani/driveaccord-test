@props(['comment'])

@can('delete', $comment)
    <div
        @cloak
        class="relative"
        x-data="{ isOpen: false }">

        <div>
            <button
                @cloak
                @mouseover="isOpen = true"
                @mouseleave="isOpen = false"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-comment-deletion-{{$comment->id}}')"
                class="text-gray-800 hover:bg-gray-200 font-bold p-2 rounded transition-colors duration-300">
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
                name="confirm-comment-deletion-{{$comment->id}}"
            >

                <form
                    method="post"
                    action="/comments/{{$comment->id}}"
                    class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to delete your comment?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once your comment is deleted, all of its resources and data will be permanently deleted.') }}
                    </p>


                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            {{ __('Delete Comment') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </div>
        <div
            @cloak
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute flex items-center justify-center p-3 text-gray-600 -translate-x-1/2 -bottom-12 left-1/2 bg-gray-700 shadow-md mt-2 px-4 py-2 rounded-lg">

            <p class="text-white">Delete</p>
        </div>

    </div>
@endcan
