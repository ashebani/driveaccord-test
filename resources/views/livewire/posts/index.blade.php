<div class="pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 grid">
        <div class="flex justify-between items-center">

            <div class="flex items-center gap-2">
                {{--    Search Bar    --}}
                <x-search/>
                {{--    Sort    --}}
                <x-sort/>
                {{--    Solved Checkbox    --}}
                <x-solved-checkbox/>
            </div>

            <a
                href="{{route('posts.create')}}"
                wire:navigate>
                <x-primary-button>Create a post</x-primary-button>
            </a>


        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">

                @forelse($posts as $post)
                    <x-post.card
                        :post="$post"/>

                @empty
                    {{ __("No posts here yet.") }}
                @endforelse
                {{$posts->links()}}

            </div>
        </div>
    </div>
</div>
