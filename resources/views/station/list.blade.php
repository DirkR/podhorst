<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stations') }}
        </h2>
    </x-slot>

    <div class="max-w-full my-3 mx-3 rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <table class="table-auto">
                <thead>
                <tr>
                    <th>{{__('Label')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stations as $station)
                    <tr>
                        <td><a href="/stations/{{$station->id}}">{{$station->label}}</a></td>
                        <td>{{$station->description}} </td>
                        <td>
                            <button href="/stations/{{$station->id}}/edit" type="button" class="btn btn-secondary">Edit</button>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
