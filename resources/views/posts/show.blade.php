@extends('layouts.app')

@section('content')
   <div class="container">
        @auth
            <div class="p-1 my-1">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        @if(!is_null($post))
                            @if(Auth::user()->id == $post->user_id)
                            <a class="btn btn-sm btn-outline-secondary" href="{{route('posts.edit', [$post])}}">Edit</a>
                            <a class="btn btn-sm btn-outline-secondary" href="#" data-toggle="modal" data-target="#modal-delete{{$post->id}}">{{__('Delete')}}</a>

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
                            @endif
                        @endif
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('dashboard')}}">Dashboard &raquo;</a>
                    </div>
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
                    <small class="text-muted">Written at {{ $post->created_at->diffForHumans() }} by <a href="{{route('users.show', [$post->user])}}">{{$post->user->name}}</a></small>
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