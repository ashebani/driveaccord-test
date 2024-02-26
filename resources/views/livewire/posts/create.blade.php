<div class="max-w-7xl mx-auto mt-10 sm:mt-16 grid">
    <form
        wire:submit="save"
        class="rounded-xl border-2 sm:p-6 p-4 mx-auto w-full lg:p-8 relative dark:border-gray-700 bg-white dark:bg-gray-900 max-w-4xl"
    >
        @csrf

        <h2 class="text-xl">Create a new post</h2>


        <x-form.input-with-label
            name="title"
            :inputErrors="$errors->get('title')"
            placeholder="{{ __('Code P0XXX in my car') }}"
            wire:model="title"
        />
        <div class="flex w-full justify-between">


            <section>
                {{--Label--}}
                <label
                    for="Category"
                    class='block font-medium text-sm mt-4 mb-1 text-gray-700 dark:text-gray-300'>
                    Category
                </label>
                <select
                    name="category_id"
                    class="rounded-md border-gray-300"
                    wire:model="category_id">

                    <option value="">Choose a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </section>

            <section>
                <label
                    for="tags"
                    class='block font-medium text-sm mt-4 mb-1 text-gray-700 dark:text-gray-300'>
                    Tags
                </label>
                <x-ts-select.styled
                    wire:model='tags'
                    :options="$postTags"
                    select="name:name|id:id"
                    sekect
                    :limit="5"
                    multiple/>

            </section>
        </div>
        <x-form.input-with-label
            name="description"
            :inputErrors="$errors->postCreation->get('description')"
            :isInput="false"
            placeholder="{{ __('Describe your issue here') }}"
            wire:model="description"
            id="text-editor"
        />

        {{--        <label--}}
        {{--            for="tags"--}}
        {{--            class='block font-medium text-sm mt-4 mb-1 text-gray-700 dark:text-gray-300'>--}}
        {{--            Tags--}}
        {{--        </label>--}}
        {{--        <textarea--}}
        {{--            wire:model="description"--}}
        {{--            name="description"--}}
        {{--            id="text-editor"--}}
        {{--        ></textarea>--}}

        @error('description')
        <p>{{$message}}</p>
        @enderror
        <div class="mt-6 flex justify-end">

            <x-primary-button class="ms-3">
                {{ __('Create post') }}
            </x-primary-button>
        </div>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
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
