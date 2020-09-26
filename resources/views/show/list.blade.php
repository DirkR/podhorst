<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shows') }}
        </h2>
    </x-slot>

    <table class="table-auto">
        <thead>
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
                <td><a href="/stations/{{$show->station->id}}">{{$show->station->label}}</a></td>
                <td><a href="/shows/{{$show->id}}">{{$show->label}}</a></td>
                <td> {{$show->description}} </td>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
