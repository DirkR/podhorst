<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Station: :label', ['label' => $station->label])
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <div class="flex flex-row w-full">
            <div class="w-1/5">
                @if($station->icon_url)
                    <img class="w-40 h-40" src="{{$station->icon_url}}" alt="@lang('app.Station') Logo">
                @else
                    <img class="w-40 h-40" src="{{config('podhorst.default_logo.url')}}" alt="{{config('podhorst.default_logo.copyright')}}">
                @endif
            </div>
            <div class="w-4/5">
                <p class="py-4">{{$station->description}}</p>
                <p>@lang('app.Homepage'): <a class="underline"
                                             href="{{$station->homepage_url}}">{{ $station->homepage_url }}</a></p>
                <p>@lang('app.Stream URL'): <a class="underline"
                                               href="{{$station->stream_url}}">{{ $station->stream_url }}</a></p>
            </div>
        </div>

        <h2 class="mt-8 text-2xl">@lang('app.Shows'):</h2>
        <ul class="list-disc pl-8 py-4">
            @foreach($station->shows as $show)
                <li><a class="underline" href="{{route('show.show', ['show' => $show->id])}}">{{$show->label}} ({{$show->episodes->count()}})</a></li>
            @endforeach
        </ul>

        <x-inputs.buttongroup>
            <a href="{{ URL::previous() }}" class="btn underline btn-primary">@lang('app.Back to list')</a>
        </x-inputs.buttongroup>
    </div>
</x-app-layout>
