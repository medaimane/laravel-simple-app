@extends('layouts.app')

@section('content')
   <div class="container">
        <h1>Blog Posts</h1>
        <hr>
        @if(!is_null($posts) && count($posts) > 0)
            <ul class="list-group">
                @foreach($posts as $post)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-sm-4">
                            <div class="img_container">
                                <img class="img-fix" src="{{asset('storage/posts/'.$post->cover_image)}}" alt="Image Not Found">
                            </div>
                        </div>
                        <div class="col col-sm-8">
                            <h4>{{ $post->title }}</h4>
                            <a class="btn btn-sm btn-outline-primary float-right" href="{{url('/posts/'.$post->id)}}">Show &raquo;</a>
                            <p>{{ $post->description }}</p>
                            <small>Written at {{ $post->created_at->diffForHumans() }} by <a href="{{url('/users/'.$post->user->id)}}">{{$post->user->name}}</a></small>
                        </div>
                    </div>
                </li>
                @endforeach
                <li class="list-group-item">{{$posts->links()}}</li>
            </ul>
        @else
            <ul class="list-group">  
                <li class="list-group-item">
                    <p>__('No Post Found')</p>
                </li>
            </ul>
        @endif
   </div>
@endsection