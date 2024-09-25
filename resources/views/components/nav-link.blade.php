@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? 'bg-gray-700 border-l-4 border-gray-200 px-8' : 'px-9' }}
    flex flex-row items-center text-sm gap-5  py-3 text-gray-200 hover:bg-gray-500"
    aria-current="{{ $active ? 'page' : false }}">
        {{ $slot }}
</a>