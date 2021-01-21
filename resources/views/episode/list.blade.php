<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Episodes')
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <x-card>
        <table class="w-full">
            <thead class="bg-gray-200">
            <tr>
                <th>@lang('app.Station')</th>
                <th>@lang('app.Show')</th>
                <th>@lang('app.Episode')</th>
                <th>@lang('app.Date')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($episodes as $episode)
                <tr>
                    <td>
                        <a class="underline" href="{{route('station.show', ['station' => $episode->show->station->id])}}">{{$episode->show->station->label}}</a>
                    </td>
                    <td><a class="underline" href="{{route('show.show', ['show' => $episode->show->id])}}">{{$episode->show->label}}</a></td>
                    <td><a class="underline" href="{{route('episode.show', ['episode' => $episode->id])}}">{{$episode->label}}</a></td>
                    <td> {{$episode->created_at->format('d.m.Y, H:i') }} </td>
            @endforeach
            </tbody>
        </table>
        </x-card>
    </div>
</x-app-layout>
