@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4 shadow-sm">
                <img class="card-img-top" width="150" height="200" src="{{asset('storage/posts/default.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4>{{$country->name}}</h4>
                    {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Update</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                        </div>
                        <small class="text-muted">Add {{$country->created_at->diffForHumans()}}</small>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="my-3 p-3 bg-white rounded shadow-sm">
        
                <h5 class="border-bottom border-gray pb-2 mb-0">Morocco People Posts</h5>
                @if(!is_null($country->posts) && count($country->posts) > 0)
                    @foreach($country->posts as $post)
                    <div class="media text-muted pt-3">
                        <div>
                            <img width="100" src="{{asset('storage/posts/'.$post->cover_image)}}" alt="" class="mr-2 rounded">
                        </div>
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h4><strong class="text-gray-dark">{{ $post->title }}</strong></h4>
                            <a href="{{route('posts.show', $post->id)}}">View more</a>
                        </div>
                        <span class="d-block">{{ $post->description }}</span>
                        <span class="d-block">Written at {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @endforeach
                    <small class="d-block text-right mt-3">
                        <span class="badge badge-lg badge-pill badge-primary">{{count($country->posts)}} Posts</span>
                    </small>
                @else
                    <div class="media text-muted pt-3"> 
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            {{__('No Post Found')}}
                        </p>
                    </div>
                @endif
        
            </div>

        </div>
    </div>
@endsection