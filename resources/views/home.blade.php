<x-app-layout>
    <x-slot name="header">
        <nav class="ml-2">
            <ol class="flex items-center gap-1 text-sm text-gray-600">

            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    @auth()
                        {{ __("You're logged in!") }}
                    @endauth

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
