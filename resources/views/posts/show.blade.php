@extends('layouts.app')

@section('content')
   <div class="container">

        @if(!is_null($post))
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="text-center">
                        <h1><u>{{ $post->title }}</u></h1>
                        <img src="{{asset('storage/posts/'.$post->cover_image)}}" alt="Image Not Found">
                    </div>
                    <p>{{ $post->description }}</p>
                    <div class="posts-body">
                        <h6><u>Post Content</u></h6>
                        <p>{!! $post->body !!}</p>
                    </div>
                    <small>Written at {{ $post->created_at->diffForHumans() }} by <a href="{{url('/users/'.$post->user->id)}}">{{$post->user->name}}</a></small>
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