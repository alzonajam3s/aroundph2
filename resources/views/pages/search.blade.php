@extends('layouts.app')

@include('partials.meta_static')

@section('content')

@if (count($blogs))

    <div class="col-md-12">
        <div class="card-header mb-4">
            <h3 class="text-center"><i class="fas fa-search"></i> Search Result</h3>
        </div>
        <div class="container">
            @foreach($blogs as $blog)
                <div class="mb-4">
                    <div class="card-header text-center">
                        <h2><a class="text-dark" href="{{ route('blogs.show', $blog->id) }}">{{ ucfirst($blog->title) }}</a></h2>
                    </div>
                    <div class="card-body">
                        @if($blog->featured_image)
                            <div class="text-center ">
                                <img class="img-fluid filimit shadowman imagee" src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title , 50)}}" >
                            </div>
                        @endif
                        <p>{!! str_limit($blog->body , 200) !!}</p>
                        <div class="text-right">
                            <a href="{{ route('blogs.show' , $blog->id) }}" class="btn color3 lead ml-2 text-dark"> <i class="fas fa-hand-point-right"></i> Continue Reading</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        @if($blog->user)
                            <span class="mr-2"><i class="far fa-bookmark"></i> By: <a href="{{ route('users.show' , $blog->user->name) }}">{{ ucfirst($blog->user->name) }}</a></span>
                            @foreach($blog->category as $category)
                                <span class="mr-2"><i class="far fa-list-alt"></i> Categories:<a href="{{ route('categories.show' , $category->slug) }}"> {{ ucfirst($category->name) }}</a></span>
                            @endforeach
                            <span class="mr-2"><i class="far fa-clock"></i> Created at: {{ $blog->created_at->format('m/d/Y')}}</span>
                            <span class="mr-2"><i class="far fa-clock"></i> Last Update: {{ $blog->updated_at->diffForHumans()}}</span> 
                        @endif
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="offset-md-5">
                {!! $blogs->links() !!}
            </div>
        </div>
    </div>

@else
    <div class="container-fluid">
        <div class="jumbotron color2 text-center">
            <h1><strong>No Record Found!</strong></h1>
            <p class="lead">Updating Soon</p>
        </div>
    </div>
@endif
@endsection