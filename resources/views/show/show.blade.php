<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}: {{$show->label}}
        </h2>
    </x-slot>

    <div class="max-w-full my-3 mx-3 rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$show->label}}</div>
            <p class="text-gray-700 text-base">{{$show->description}}</p>
            <p>Episodes:</p>
            <ul>
                @foreach($show->episodes as $episode)
                    <li><a href="/episodes/{{$episode->id}}">{{$episode->label}}</a></li>
                @endforeach
            </ul>
            <hr>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</x-app-layout>
