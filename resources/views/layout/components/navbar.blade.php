<header class="flex items-center justify-between px-4 py-3 bg-gray-800">
    <div>
        <a class="text-white font-semibold rounded hover:bg-gray-800" href="/">
            {{ config("app.name") }}
        </a>
    </div>
    <div>
        <a href="/stations" class="{{Request::is('stations') || Request::is('stations/*')}} px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Stations</a>
        <a href="/shows" class="{{Request::is('shows') || Request::is('shows/*')? 'active' : ''}} mt-1 px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Shows</a>
        <a href="/episodes" class="{{Request::is('episodes') || Request::is('episodes/*')? 'active' : ''}} mt-1 px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Episodes</a>
    </div>
</header>
