@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-3 px-1 pt-1 border-b-2 border-white-1000 text-sm font-large leading-5 text-white-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center p-3 px-1 pt-1 border-b-2 border-transparent text-sm font-Large leading-5 text-white-900 hover:text-white-700 hover:border-gray-100 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
