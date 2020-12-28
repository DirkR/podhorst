<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Show: :label', ['label' => $show->label])
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <form method="POST" action="{{ route('show.update', ['show' => $show->id]) }}">
            @csrf
            @method('PUT')

            <x-inputs.group for="station" label="Station">
                <x-inputs.text for="station" value="{{ $show->station->label }}" readonly=1></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="label" label="Label">
                <x-inputs.text for="label" value="{{ $show->label }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="description" label="Description">
                <x-inputs.textarea for="description">{{ $show->description }}</x-inputs.textarea>
            </x-inputs.group>

            <x-inputs.group for="slug" label="Slug">
                <x-inputs.text for="slug" value="{{ $show->slug }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="url" label="URL">
                <x-inputs.text for="url" value="{{ $show->url }}"></x-inputs.text>
            </x-inputs.group>

            <hr class="my-4">

            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">@lang('app.Submit')</button>
            </div>
        </form>
    </div>
</x-app-layout>
