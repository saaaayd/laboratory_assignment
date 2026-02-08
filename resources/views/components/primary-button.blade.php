<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-black dark:bg-white border border-transparent rounded-none font-bold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-gray-800 dark:hover:bg-gray-200 focus:bg-gray-800 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 dark:focus:ring-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
