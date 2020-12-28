<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Episode: :label', ['label' => $episode->label]) }}
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <p class="card-text">{{$episode->description}}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</x-app-layout>
