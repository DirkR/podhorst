<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Episode') }}: {{$episode->label}}
        </h2>
    </x-slot>

    <div class="max-w-lg my-3 mx-3 rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$episode->label}}</div>
            <p class="text-gray-700 text-base">{{$episode->description}}</p>
            <hr>
            <button href="#" class="btn btn-primary">Go somewhere</button>
        </div>
    </div>
</x-app-layout>
