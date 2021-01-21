@props([
'value' => '',
'readonly' => false,
'for'
])
<div class="rounded-md shadow-sm">
    <input type="text"
           id="{{ $for }}"
           name="{{ $for }}"
           {{ $readonly ? "readonly" : "" }}
           value="{{ $value }}"
        {{ $attributes->merge(['class' => 'bg-white border border-gray-200 py-2 px-3 rounded-lg w-full block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
    />
    @error("{{ $for }}")
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
