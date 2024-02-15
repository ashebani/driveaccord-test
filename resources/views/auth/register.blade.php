<x-guest-layout>
    <form
        method="POST"
        action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <x-form.input-with-label
            name="name"
            placeholder="Christofer Nolan"
        />

        <!-- Email Address -->
        <x-form.input-with-label
            name="email"
            type="email"
            placeholder="Email Address"
            autocomplete="username"
        />

        <!-- Password -->
        <x-form.input-with-label
            name="password"
            type="password"
            placeholder="********"
            type="password"
            autocomplete="current-password"
        />

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-form.input-label
                name="Confirm Password"
                for="password_confirmation"
                :value="__('Confirm Password')"/>

            <x-form.text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                placeholder="********"
                required
                autocomplete="new-password"/>

            <x-form.input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
