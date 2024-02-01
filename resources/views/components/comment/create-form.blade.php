@props(['post'])
@auth()
    {{--Comment Input--}}
    <form
        action="/posts/{{$post->id}}/comments"
        method="POST">
        @csrf
        <x-form.textarea
            name="body"
            placeholder="Add a comment..."/>

        <x-form.input-error :messages="$errors->addComment->get('body')"/>

        <x-primary-button class="mt-2">Add</x-primary-button>
    </form>
@endauth
