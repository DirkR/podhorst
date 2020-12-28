<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show: :label', ['label' => $show->label]) }}
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <p class="py-4">{{$show->description}}</p>
        <ul class="list-disc p-8">
            @foreach($show->episodes as $episode)
                <li><a href="{{ route('episode.show', ['episode' => $episode->id])}}">{{$episode->label}}</a></li>
            @endforeach
        </ul>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</x-app-layout>
