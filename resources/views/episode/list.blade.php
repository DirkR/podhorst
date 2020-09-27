<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Episodes') }}
        </h2>
    </x-slot>

    <div class="max-w-full my-3 mx-3 rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <table class="table-auto">
                <thead>
                <tr>
                    <th>{{__('Show')}}</th>
                    <th>{{__('Label')}}</th>
                    <th>{{__('Description')}}</th>
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
        </div>
    </div>
</x-app-layout>
