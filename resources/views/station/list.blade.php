<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stations') }}
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <table class="w-full">
            <thead class="bg-gray-200">
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
                        <a href="{{route('station.show', ['station' => $station->id])}}" type="button" class="btn btn-primary">Show</a>
                        <a href="{{route('station.edit', ['station' => $station->id])}}" type="button" class="btn btn-secondary">Edit</a>
                    </td>

            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
