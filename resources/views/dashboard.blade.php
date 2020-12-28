<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Dashboard')
        </h2>
    </x-slot>

    <div class="py-12 mx-auto">
        <div class="w-1/3 sm:px-6 lg:px-8 flex-row">
            @foreach($stations as $station)
                <div class="bg-white shadow-xl sm:rounded-lg m-4 flex">
                    <h3>{{$station->label}}</h3>
                    <div>
                    <ul class="list-disc">
                        @foreach($station->shows as $show)
                            <li>
                                {{$show->label}} ({{ $show->episodes->count() }})
                            </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
