@props(['model'])

<x-tooltip
    function="bookmark"
    :model="$model">
    <x-slot name="buttonIcon">
        @if($model->bookmarks->contains('user_id',auth()->id()))
            <x-jam-bookmark-f class="w-6 h-6 dark:fill-gray-100"/>
        @else
            <x-jam-bookmark class="w-6 h-6 dark:fill-gray-100"/>
        @endif
    </x-slot>
    <x-slot name="text">
        {{$model->bookmarks->contains('user_id' , auth()->id())? 'Unsave' : 'Save'}}
    </x-slot>
</x-tooltip>

