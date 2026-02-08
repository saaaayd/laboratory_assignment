@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-600 dark:bg-black dark:text-white focus:border-black dark:focus:border-white focus:ring-black dark:focus:ring-white rounded-none shadow-sm']) }}>
