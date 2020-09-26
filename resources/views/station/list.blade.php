<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stations') }}
        </h2>
    </x-slot>

    <table class="table-auto">
        <thead>
        <tr>
            <th>label</th>
            <th>description</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stations as $station)
            <tr>
                <td> {{$station->label}} </td>
                <td> {{$station->description}} </td>
                <td>
                    <a href="/stations/{{$station->id}}" type="button" class="btn btn-primary">Show</a>
                    <a href="/stations/{{$station->id}}/edit" type="button" class="btn btn-secondary">Edit</a>
                </td>

        @endforeach
        </tbody>
    </table>
</x-app-layout>
