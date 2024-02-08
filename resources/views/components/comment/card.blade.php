@props(['comment', 'solution_comment_id'])

<div class="flex gap-4">
    <div class="ml-16 w-full rounded-xl self-start border-2 border-gray-100 bg-white {{$solution_comment_id == $comment->id ? 'border-green-700' : ''}} ">
        <div class="gap-4 p-4 sm:p-4 lg:p-6">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <img
                        src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                        class="h-12 w-12 rounded-lg object-cover"
                        alt="contributer">
                </div>
                <div class="w-full">
                    <h3 class="text-sm font-semibold">{{$comment->user->name}}</h3>
                    <p class="text-xs text-gray-600">Posted
                        at {{date_format($comment->created_at, 'g:i A')}}</p>
                </div>
                <x-save-and-helpful :saveable_data="$comment"/>
                <x-comment.delete-form :comment="$comment"/>

            </div>

            <hr class="my-4"/>

            <p class="text-sm mt-4 text-gray-800">{{$comment->body}}</p>
        </div>
    </div>
</div>
