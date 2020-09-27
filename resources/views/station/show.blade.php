<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Station') }}: {{$station->label}}
        </h2>
    </x-slot>

    <div class="max-w-full my-3 mx-3 rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$station->label}}</div>
            <p class="text-gray-700 text-base">{{$station->description}}</p>
            <p>Shows:</p>
            <ul>
                @foreach($station->shows as $show)
                    <li><a href="/shows/{{$show->id}}">{{$show->label}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
