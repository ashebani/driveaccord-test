<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-4">
        <h2 class="text-xl font-bold">Most Active Posts</h2>
        @foreach($mostActivePosts as $post)
            <x-post.card :post="$post"/>
        @endforeach
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-4">
        <h2 class="text-xl font-bold">Latest Posts</h2>
        @foreach($latestPosts as $post)
            <x-post.card :post="$post"/>
        @endforeach
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-4">
        <h2 class="text-xl font-bold">Most Helpful Posts</h2>
        @foreach($mostHelpfulPosts as $post)
            <x-post.card :post="$post"/>
            {{--            <p>{{$post->comments()}}</p>--}}
        @endforeach
    </div>
</div>
