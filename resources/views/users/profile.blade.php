@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card d-flex text-light p-5 my-3 rounded" style="background-image: url('{{asset('storage/users/default-cover.jpg')}}')">
        <a class="float-right" href="{{route('users.edit', $user)}}">Update Profile</a>
        <div class="text-center p-1 mb-2">
            <img class="mb-0 rounded" src="{{asset('storage/users/user.jpg')}}" alt="" width="150" height="150">
        </div>
        <div class="text-center">
            <h2 class="mb-0">{{$user->name}}<small class="text-light"> from <a href="{{route('countries.show', $user->country->id)}}">{{$user->country->name}}</a></small></h2>
            <small>Since {{$user->created_at->diffForHumans()}}</small>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        
        <h5 class="border-bottom border-gray pb-2 mb-0">Posts - Recent updates</h5>
        @if(!is_null($user->getRecentsUpdatedPosts(4)) && count($user->getRecentsUpdatedPosts(4)) > 0)
            @foreach($user->getRecentsUpdatedPosts(4) as $post)
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
                <a href="{{route('posts.index')}}">All updates</a>
            </small>
        @else
            <div class="media text-muted pt-3"> 
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    {{__('No Post Found')}}
                </p>
            </div>
        @endif

    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-2 mb-0">Your Roles</h5>
        <div class="row m-auto">
            @if (count($user->roles) > 0)
                @foreach ($user->roles as $role)
                    <div class="col-md-3 card m-2">
                        <div class="card-body">
                            <h4 class="card-title"><strong class="text-gray-dark">{{$role->name}}</strong></h4>
                            <p class="card-text text-muted">{{$role->description}}</p>
                            <img class="card-img-top" src="{{asset('storage/posts/default.jpg')}}" width="100px" alt="Card image cap">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection