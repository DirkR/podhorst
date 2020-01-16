<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/svg/freeCodeCampLogo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        {{config("app.name", "Dirk der Superadmin")}}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link {{Request::is('/') ? 'active' : ''}}" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('stations') || Request::is('stations/*')? 'active' : ''}}" href="/stations">Station</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('shows') || Request::is('shows/*')? 'active' : ''}}" href="/shows">Shows</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('episodes') || Request::is('episodes/*')? 'active' : ''}}" href="/episodes">Episodes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
