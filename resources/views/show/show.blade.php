<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Show: :label', ['label' => $show->label])
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <p class="py-4">{{$show->description}}</p>
        <ul class="list-disc p-8">
            @foreach($show->episodes as $episode)
                <li><a href="{{ route('episode.show', ['episode' => $episode->id])}}">{{$episode->label}}</a></li>
            @endforeach
        </ul>

        <x-inputs.buttongroup>
            <a href="{{ URL::previous() }}" class="btn underline btn-primary">@lang('app.Back to list')</a>
        </x-inputs.buttongroup>

    </div>
</x-app-layout>
