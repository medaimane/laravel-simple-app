@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center p-3 my-2 text-white-50 bg-purple rounded shadow-sm">
                <img class="mr-3" src="{{asset('storage/users/user.jpg')}}" alt="" width="48" height="48">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">{{Auth::user()->name}}</h6>
                    <small>Since {{Auth::user()->created_at->diffForHumans()}}</small>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                    <small class="float-right">{{__('You are logged in!')}}</small>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="p-1 my-1">
                        <h4 class="float-left"><u>Your Posts</u></h4>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <a class="btn btn-sm btn-outline-success" href="{{url('/posts/create')}}">Create Post</a>
                        </div>
                    </div>
                    <div>
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
                                            <div class="btn-group float-right">
                                                <a class="btn btn-sm btn-outline-info" href="{{url('/posts/'.$post->id)}}">{{__('Show')}}</a>
                                                <a class="btn btn-sm btn-outline-secondary" href="{{url('/posts/'.$post->id.'/edit')}}">{{__('Edit')}}</a>
                                                <a class="btn btn-sm btn-outline-danger" href="#">{{__('Delete')}}</a>
                                            </div>
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

                    <br>

                    <div class="p-2 my-2">
                        <h4><u>Your Comments</u></h4>
                    </div>

                    <br>

                    <div class="p-2 my-2">
                        <h4><u>Your Roles</u></h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
