<form wire:submit="save">
    @if(auth()->user()->image)
        <img
            class="w-40 h-40 rounded mb-4"
            src="{{auth()->user()->image_url}}"
            alt="">
    @endif
    <input
        class="inline-flex justify-center items-center px-6 py-2.5 text-sm font-medium tracking-wider bg-gray-800 border border-transparent rounded-md text-md text-white dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2"
        type="file"
        wire:model="photo">

    @error('photo') <span class="error">{{ $message }}</span> @enderror

    <x-primary-button type="submit">Save photo</x-primary-button>
</form>
