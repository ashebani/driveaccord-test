<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-6 py-2.5 text-sm font-medium bg-primary dark:bg-primary border border-transparent tracking-wide rounded-md text-md text-white dark:text-white hover:bg-gray-700 dark:hover:bg-primary-600 focus:bg-gray-700 dark:focus:bg-primary-200 active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
