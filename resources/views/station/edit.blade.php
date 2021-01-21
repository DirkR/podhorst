<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Station: :label', ['label' => $station->label])
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <form method="POST" action="{{ route('station.update', ['station' => $station->id]) }}">
            @csrf
            @method('PUT')

            <x-inputs.group for="label" label="{{ __('app.Label') }}">
                <x-inputs.text for="label" value="{{ $station->label }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="description" label="{{ __('app.Description') }}">
                <x-inputs.textarea for="description">{{ $station->description }}</x-inputs.textarea>
            </x-inputs.group>

            <x-inputs.group for="slug" label="{{ __('app.Slug') }}">
                <x-inputs.text for="slug" value="{{ $station->slug }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="homepage_url" label="{{ __('app.Homepage') }}">
                <x-inputs.text for="homepage_url" value="{{ $station->homepage_url }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="stream_url" label="{{ __('app.Stream URL') }}">
                <x-inputs.text for="stream_url" value="{{ $station->stream_url }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="icon_url" label="{{ __('app.Icon URL') }}">
                <x-inputs.text for="icon_url" value="{{ $station->icon_url }}"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.buttongroup>
                <a href="{{ URL::previous()  }}">@lang('app.Back')</a>
                <x-inputs.button>@lang('app.Submit')</x-inputs.button>
            </x-inputs.buttongroup>
        </form>
    </div>
</x-app-layout>
