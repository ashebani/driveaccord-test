@props(['categories', 'tags'])
@auth()
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'post-creation')"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            viewBox="0 0 20 20"
            fill="currentColor">
            <path
                fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                clip-rule="evenodd"/>
        </svg>
        <span>&nbsp;Create a post</span>
    </x-primary-button>
    <x-modal
        maxWidth="4xl"
        name="post-creation"
        :show="$errors->postCreation->isNotEmpty()"
        class="max-w-5xl"
        focusable>
        <div class=" grid w-full p-8 overflow-hidden text-left transition-all transform bg-white rounded-lg 2xl:max-w-4xl">
            <button
                x-on:click="$dispatch('close')"
                class="text-gray-600 focus:outline-none hover:text-gray-700 justify-self-end">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Make a post') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <form
                method="post"
                action="/posts"
            >
                @csrf


                <x-form.input-with-label
                    name="title"
                    :inputErrors="$errors->get('title')"
                    placeholder="{{ __('Code P0XXX in my car') }}"/>

                {{--Label--}}
                <label
                    for="Category"
                    class='block font-medium text-sm mt-4 mb-1 text-gray-700 dark:text-gray-300'>
                    Category
                </label>
                <select
                    name="category_id"
                    class="rounded-md border-gray-300">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>

                <label
                    for="tags"
                    class='block font-medium text-sm mt-4 mb-1 text-gray-700 dark:text-gray-300'>
                    Tags
                </label>
                <div class="max-w-80">

                    <select
                        multiple
                        name="tags[]"
                        id="tags"
                        x-data="{}"
                        x-init="function () { choices($el) }"
                        class="rounded border-gray-300"
                    >

                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <x-form.input-with-label
                    name="description"
                    :inputErrors="$errors->postCreation->get('description')"
                    :isInput="false"
                    placeholder="{{ __('Describe your issue here') }}"
                    id="text-editor"
                />
                <div class="mt-6 flex justify-end">

                    <x-primary-button class="ms-3">
                        {{ __('Create post') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </x-modal>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#text-editor'), {
                    ckfinder:
                        {uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',}
                }
            )
            .catch(error => {
                console.error(error);
            });
    </script>

@endauth
