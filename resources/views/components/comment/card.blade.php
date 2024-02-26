@props(['comment', 'solution_comment_id'])

<div class="flex gap-4">
    <div class="ml-16 w-full rounded-xl self-start border-2 border-gray-100 bg-white {{$solution_comment_id == $comment->id ? 'border-green-700' : ''}} ">
        <div class="gap-4 p-4 sm:p-4 lg:p-6">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <img
                        src="{{public_path('avatars/' . $comment->user->image)}}"
                        class="h-12 w-12 rounded-lg object-cover"
                        alt="contributer">
                </div>
                <div class="w-full">
                    <h3 class="text-sm font-semibold">{{$comment->user->name}}</h3>
                    <p class="text-xs text-gray-600">Posted
                        at {{date_format($comment->created_at, 'g:i A')}}</p>
                </div>
                <div class="flex space-x-1 bg-white items-center p-1 rounded">

                    <!-- Bookmark Button -->
                    <x-bookmark :model="$comment"/>

                    <!-- Helpful Button -->
                    <x-helpful :model="$comment"/>

                </div>
                <x-comment.delete-form :comment="$comment"/>

            </div>

            <hr class="my-4"/>

            <p class="text-sm mt-4 text-gray-800">{{$comment->body}}</p>
        </div>
    </div>
</div>
