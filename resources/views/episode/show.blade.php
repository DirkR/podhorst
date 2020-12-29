<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Episode: :label', ['label' => $episode->label])
        </h2>
    </x-slot>

    <div class="w-5/6 sm:w-full xl:w-2/3 m-auto my-8">
        <p class="card-text">{{$episode->description}}</p>

        <x-inputs.buttongroup>
            <a href="{{ URL::previous() }}" class="btn btn-primary">@lang('app.Back to list')</a>
        </x-inputs.buttongroup>
    </div>
</x-app-layout>
