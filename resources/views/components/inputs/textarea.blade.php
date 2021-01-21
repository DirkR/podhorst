@props([
'rows' => 3,
'readonly' => false,
'for'
])
<div class="rounded-md shadow-sm">
    <textarea id="{{ $for }}"
              name="{{ $for }}"
              {{ $attributes->merge(['class' => 'bg-white border border-gray-200 py-2 px-3 rounded-lg w-full block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
              {{ $readonly ? "readonly" : "" }}
              rows="{{ $rows }}">{{ $slot }}</textarea>
</div>
