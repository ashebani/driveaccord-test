<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-6 py-2.5 text-sm font-medium tracking-wider bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md text-md text-white dark:text-gray-800 tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
