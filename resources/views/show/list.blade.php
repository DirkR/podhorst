<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shows') }}
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <table class="w-full">
            <thead class="bg-gray-200">
            <tr>
                <th>station</th>
                <th>label</th>
                <th>description</th>
                <th> &nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shows as $show)
                <tr>
                    <td><a href="{{route('station.show', ['station' => $show->station->id])}}">{{$show->station->label}}</a></td>
                    <td><a href="{{route('show.show', ['show' => $show->id])}}">{{$show->label}}</a></td>
                    <td> {{$show->description}} </td>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
