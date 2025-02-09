@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-bold text-bold rounderd text-red-500 inline-flex items-center px-1 pt-1 border-b-2 border-rose-400 dark:border-red-600 text-sm font-medium leading-5 text-black text-gray-black focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : ' font-bold text-bold rounderd text-red-500 inline-flex items-center px-1 pt-1 border-b-2text-sm font-medium leading-5   dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
