<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Episodes') }}
        </h2>
    </x-slot>

    <table class="table-auto">
        <thead>
        <tr>
            <th>show</th>
            <th>label</th>
            <th>description</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($episodes as $episode)
            <tr>
                <td><a href="/shows/{{$episode->show->id}}">{{$episode->show->label}}</a></td>
                <td><a href="/episodes/{{$episode->id}}">{{$episode->label}}</a></td>
                <td> {{$episode->description}} </td>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
