<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Show: :label', ['label' => $show->label])
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <div class="flex flex-row w-full">
            <div class="w-1/5">
                @if($show->icon_url)
                    <img class="w-40 h-40" src="{{$station->icon_url}}" alt="@lang('app.Station') Logo">
                @elseif($show->station->icon_url)
                    <img class="w-40 h-40" src="{{$show->station->icon_url}}" alt="@lang('app.Station') Logo">
                @else
                    <img class="w-40 h-40" src="{{config('podhorst.default_logo.url')}}" alt="{{config('podhorst.default_logo.copyright')}}">
                @endif
            </div>
            <div class="w-4/5">
                <p>@lang('app.Station'): <a class="underline"
                                             href="{{route('station.show', ['station' => $show->station->id])}}">{{ $show->station->label }}</a></p>
                <p class="py-4">{{$show->description}}</p>
                <p>@lang('app.Homepage'): <a class="underline"
                                             href="{{$show->homepage_url}}">{{ $show->homepage_url }}</a></p>
                <p>@lang('app.Duration'): {{ $show->duration }}</p>
                <p>@lang('app.Day'): {{ $show->day }}</p>
                <p>@lang('app.Time'): {{ $show->hour }}: {{ $show->minute }}</p>
                <p>@lang('app.Active'): {{ $show->active ? __('app.Yes') : __('app.No') }}</p>
            </div>
        </div>

        <ul class="list-disc p-8">
            @foreach($show->episodes as $episode)
                <li><a href="{{ route('episode.show', ['episode' => $episode->id])}}">{{$episode->label}}</a></li>
            @endforeach
        </ul>

        <x-inputs.buttongroup>
            <a href="{{ URL::previous() }}" class="btn underline btn-primary">@lang('app.Back to list')</a>
        </x-inputs.buttongroup>

    </div>
</x-app-layout>
