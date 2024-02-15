<x-guest-layout>
    <form
        method="POST"
        action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <x-form.input-with-label
            name="email"
            type="email"/>

        <!-- Password -->
        <x-form.input-with-label
            name="password"
            type="password"
            placeholder=""
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
                required
                autocomplete="new-password"/>

            <x-form.input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
