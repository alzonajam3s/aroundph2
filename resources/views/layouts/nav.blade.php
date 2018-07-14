<nav class="navbar navbar-expand-md navbar-light sticky-top navbar-laravel color3">
    <div class="container-fluid">
        {{-- Left Side of Navbar --}}
        <a class="navbar-brand mr-auto" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Center of Navbar --}}
        <ul class="navbar-nav mx-auto">
            <li><a class="nav-link" href="{{ route('blogs') }}">Home</a></li>
            <li>
                <a class="nav-link" href="{{ route('blogs') }}">Blogs
                    <span class="badge bg-dark text-white">
                        {{ $blogs->count() }}
                    </span>
                </a>
            </li>
            <li><a class="nav-link" href="{{ route('categories.index') }}">Destinations</a></li>
            <li><a class="nav-link" href="{{ route('news.index') }}">News</a></li>
            <li><a class="nav-link" href="{{ route('articles.index') }}">Articles</a></li>
            <li><a class="nav-link" href="{{ route('pages.aboutme') }}">About Us</a></li>
            <li><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto ">

            <!-- Authentication Links -->
            <form class="form-inline" action="search">
                <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            @guest
                <li><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-external-link-square-alt"></i> {{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}"><i class="far fa-hand-pointer"></i> {{ __('Register to Subscribe') }}</a></li>
            @else
            <div class="btn-group dropdown">
                <button class="btn dropdown-toggle color3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account - <strong>{{ Auth::user()->name }}</strong></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('pages.userprofile' , Auth::user()->id) }}" >
                        <i class="fas fa-user-circle"></i> User Profile</a>
                    @if(Auth::user() && Auth::user()->role_id === 1)
                        <a class="dropdown-item" href="{{ route('dashboard') }}" >
                            <i class="fas fa-door-open"></i> Dashboard</a>
                    @elseif(Auth::user() && Auth::user()->role_id === 2)
                        <a class="dropdown-item" href="{{ route('dashboard') }}" >
                            <i class="fas fa-door-open"></i> Dashboard</a>
                    @elseif(Auth::user() && Auth::user()->role_id === 3)

                    @endif
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </ul>
    </div>
</nav>
