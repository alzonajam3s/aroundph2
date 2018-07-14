{{-- SIDE NAVIGNATION FOR ADMIN and AUTHOR --}}
<div class="sidenav">
	@if(Auth::user() && Auth::user()->role_id === 1)
		<a class="text-center" href="{{ route('dashboard') }}">
			<i class="fas fa-users-cog fa-3x text-dark"></i>
		</a>
		<p class="lead text-center">Admin Dashboard</p>
	    <hr>

    @elseif(Auth::user() && Auth::user()->role_id === 2)
		<a class="text-center">
			<i class="fas fa-users-cog fa-3x text-dark"></i>
		</a>
		<p class="lead text-center">Author Dashboard</p>
	    
    @elseif(Auth::user() && Auth::user()->role_id === 3)
    
    @endif
    <a href="{{ route('blogs') }}"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <hr>
	@if(Auth::user() && Auth::user()->role_id === 1)
    {{-- BLOGS --}}
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse1"><i class="fas fa-map-pin"></i> Blogs</a>
            <div id="collapse1" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('pages.myblogs' , Auth::User()->name) }}" >
                        <i class="fas fa-address-book"></i> My Blogs </a> 
                    </li>
                    <li class="bgtrans">
                        <a href="{{ route('blogs.create') }}" >
                        <i class="fas fa-plus-circle"></i> Create Blog</a>
                    </li>
                    <li class="bgtrans">
                        <a href="{{ route('admin.blogs') }}" >
                        <i class="fab fa-firstdraft"></i> Draft Blog</a>
                    </li>
                    <li class="bgtrans">
                        <a href="{{ route('blogs.trash') }}" >
                        <i class="fas fa-trash-alt"></i> Trashed Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    {{-- CATEGORIES     --}}
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse2"><i class="fas fa-map-pin"></i> Categories</a>
            <div id="collapse2" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('pages.catlist') }}" >
                        <i class="fas fa-certificate"></i> Category List</a>
                    </li>
                    <li class="bgtrans">
                        <a href="{{ route('categories.create') }}" >
                        <i class="fas fa-plus-circle"></i> Create Category</a>
                    </li>
                </ul>
            </div>
        </div>
    {{-- NEWS --}}
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse3"><i class="fas fa-map-pin"></i> News</a>
            <div id="collapse3" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('news.list') }}" >
                            <i class="fas fa-newspaper"></i> News List</a> 
                    </li>
                    <li class="bgtrans">
                        <a href="{{ route('news.create') }}" >
                            <i class="fas fa-plus"></i> Create News</a> 
                    </li>
                </ul>
            </div>
        </div> 
    {{-- ARTICLES            --}}
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse4"><i class="fas fa-map-pin"></i> Articles</a>
            <div id="collapse4" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('articles.list') }}" >
                            <i class="fas fa-newspaper"></i> Articles List</a> 
                    </li>                    
                    <li class="bgtrans">
                        <a href="{{ route('articles.create') }}" >
                            <i class="fas fa-clipboard-list"></i> Create Articles</a> 
                    </li>
                </ul>
            </div>
        </div>   
    {{-- USERS            --}}
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse5"><i class="fas fa-map-pin"></i> Users</a>
            <div id="collapse5" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('users.index') }}" >
                        <i class="fas fa-user-tag"></i> Manage Users</a> 
                    </li>
                </ul>
            </div>
        </div>   
    {{-- CAROUSEL            --}}
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse6"><i class="fas fa-map-pin"></i> Carousel</a>
            <div id="collapse6" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('carousel.index') }}" >
                        <i class="fas fa-images"></i> Carousel Images</a> 
                    </li>
                </ul>
            </div>
        </div> 
        <div class="card-footer">
        </div>              


    @elseif(Auth::user() && Auth::user()->role_id === 2)
        <div class="panel-group">
            <a class="snsize text-black" data-toggle="collapse" href="#collapse1"><i class="fas fa-map-pin"></i> Blogs</a>
            <div id="collapse1" class=" collapse">
                <ul class="list-group ml-3">
                    <li class="bgtrans">
                        <a href="{{ route('pages.myblogs' , Auth::User()->name) }}" >
                        <i class="fas fa-address-book"></i> My Blogs </a> 
                    </li>
                    <li class="bgtrans">
                        <a href="{{ route('blogs.create') }}" >
                        <i class="fas fa-plus-circle"></i> Create Blog</a>
                    </li>
                </ul>
            </div>
        </div>    

    @elseif(Auth::user() && Auth::user()->role_id === 3)

    @endif
</div>