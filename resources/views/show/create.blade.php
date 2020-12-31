<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.New show')
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <form method="POST" action="{{ route('show.store') }}">
            @csrf

            <x-inputs.group for="station" label="{{ __('app.Station')}}">
                <input name="station_id" type="hidden" value="{{ $station_id }}">
                <x-inputs.text for="station" value="{{ $stations[$station_id] }}" readonly=1></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="label" label="{{ __('app.Label') }}">
                <x-inputs.text for="label"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="description" label="{{ __('app.Description') }}">
                <x-inputs.textarea for="description"></x-inputs.textarea>
            </x-inputs.group>

            <x-inputs.group for="slug" label="{{ __('app.Slug') }}">
                <x-inputs.text for="slug"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="day" label="{{ __('app.Day') }}">
                <x-inputs.day-selection for="day" value="{{ date('N') }}"></x-inputs.day-selection>
            </x-inputs.group>

            <x-inputs.group for="time" label="{{ __('app.Time') }}">
                <x-inputs.time-selection for="time" hour="{{ date('H') + 1 }}" minute="5"></x-inputs.time-selection>
            </x-inputs.group>

            <x-inputs.group for="duration" label="{{ __('app.Duration') }}">
                <x-inputs.time-selection for="duration" hour="0" minute="15"></x-inputs.time-selection>
            </x-inputs.group>

            <x-inputs.group for="homepage_url" label="{{ __('app.Homepage') }}">
                <x-inputs.text for="homepage_url"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group for="icon_url" label="{{ __('app.Icon URL') }}">
                <x-inputs.text for="icon_url"></x-inputs.text>
            </x-inputs.group>

            <x-inputs.buttongroup>
                <a href="{{ URL::previous()  }}">@lang('app.Back')</a>
                <x-inputs.button>@lang('app.Submit')</x-inputs.button>
            </x-inputs.buttongroup>
        </form>
    </div>
</x-app-layout>
