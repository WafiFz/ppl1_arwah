@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
    {{ $attributes->class(['bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand-purple-500 focus:border-brand-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brand-purple-500 dark:focus:border-brand-purple-500']) }}
/>