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
    name="post-creation"
    :show="$errors->postCreation->isNotEmpty()"
    focusable>
    <div class=" grid w-full p-8 overflow-hidden text-left transition-all transform bg-white rounded-lg 2xl:max-w-2xl">
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
                :inputErrors="$errors->postCreation->get('title')"
                placeholder="{{ __('Code P0XXX in my car') }}"/>

            <x-form.input-with-label
                name="description"
                :inputErrors="$errors->postCreation->get('description')"
                :isInput="false"
                placeholder="{{ __('Describe your issue here') }}"/>

            <div class="mt-6 flex justify-end">

                <x-primary-button class="ms-3">
                    {{ __('Create post') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
