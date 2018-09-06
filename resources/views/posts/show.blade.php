@extends('layouts.app')

@section('content')
   <div class="container">
        @auth
            <div class="p-1 my-1">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <a class="btn btn-sm btn-outline-primary" href="{{url('/dashboard')}}">Dashboard &raquo;</a>
                </div>
            </div>
        @endauth
        @if(!is_null($post))
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="text-center">
                        <h1><u>{{ $post->title }}</u></h1>
                        <div class="img-container-show">
                            <img class="img-fix-show" src="{{asset('storage/posts/'.$post->cover_image)}}" alt="Image Not Found">
                        </div>
                    </div>
                    <hr>
                    <p>{{ $post->description }}</p>
                    <hr>
                    <div class="posts-body">
                        <h6><u>Post Content</u></h6>
                        <p>{!! $post->body !!}</p>
                    </div>
                    <hr>
                    <small class="text-muted">Written at {{ $post->created_at->diffForHumans() }} by <a href="{{url('/users/'.$post->user->id)}}">{{$post->user->name}}</a></small>
                </li>
            </ul>
        @else
            <ul class="list-group">  
                <li class="list-group-item">
                    <p>__('Post Not Found')</p>
                </li>
            </ul>
        @endif
   </div>
@endsection