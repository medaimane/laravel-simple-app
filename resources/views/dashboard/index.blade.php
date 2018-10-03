@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                    <small class="float-right">
                        <img width="10" src="{{asset('storage/others/blue.svg')}}" alt="" class="mr-1 rounded">
                        <a href="{{route('users.profile', Auth::user()->username)}}">Your Profile</a>
                    </small>
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
                            <a class="btn btn-sm btn-outline-success" href="{{route('posts.create')}}">Create Post</a>
                        </div>
                    </div>
                    <div>
                        @if(!is_null($posts) && count($posts) > 0)
                            <ul class="list-group">
                                @foreach($posts as $post)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col col-sm-4">
                                            <div class="img-container">
                                                <img class="img-fix" src="{{asset('storage/posts/'.$post->cover_image)}}" alt="Image Not Found">
                                            </div>
                                        </div>
                                        <div class="col col-sm-8">
                                            <h4>{{ $post->title }}</h4>
                                            <div class="btn-group float-right">
                                                <a class="btn btn-sm btn-outline-info" href="{{route('posts.show', ['id' => $post->id])}}">{{__('Show')}}</a>
                                                <a class="btn btn-sm btn-outline-secondary" href="{{route('posts.edit', ['id' => $post->id])}}">{{__('Edit')}}</a>
                                                <a class="btn btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#modal-delete{{$post->id}}">{{__('Delete')}}</a>
                                            </div>
                                            <p>{{ $post->description }}</p>
                                            <small>Written at {{ $post->created_at->diffForHumans() }} by <a href="{{route('users.show', [$post->user])}}">{{$post->user->name}}</a></small>
                                        </div>
                                    </div>
                                </li>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-danger">
                                                Are you sure to delete this post !
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{route('posts.destroy', [$post])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <li class="list-group-item">{{$posts->links()}}</li>
                            </ul>
                        @else
                            <ul class="list-group">  
                                <li class="list-group-item">
                                    <p>{{__('No Post Found')}}</p>
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

                        <div class="row m-auto">
                            @if (count(Auth::user()->roles) > 0)
                                @foreach (Auth::user()->roles as $role)
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
            </div>
        </div>
    </div>
</div>
@endsection
