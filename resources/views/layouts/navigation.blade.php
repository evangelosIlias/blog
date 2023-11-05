<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::id()) 
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('posts.create')}}">Create Post <span class="sr-only">(current)</span></a>
                </li>
            @endif
        </ul>
        @if(Auth::check())
        <div class="navbar-text mr-3">
            <i class="fa-solid fa-user" style="margin-right: 2px;"></i>
            {{ Auth::user()->name }}
        </div>
            <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-success mr-3 my-sm-0" type="submit">Logout</button>
            </form>
        @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        @endauth
        <form class="form-inline my-2 my-lg-0" action="{{ route('posts.search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" name="searchQuery" value="{{ request()->searchQuery }}" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        
    </div>
</nav>

