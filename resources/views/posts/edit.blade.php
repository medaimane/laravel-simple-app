@extends('layouts.app')

@section('content')
   <div class="container">
        <h1>Edit Post</h1>
        <hr>
        <div class="card">
            <div class="card-header">
                Update Your Post
                <a class="btn btn-sm btn-outline-primary float-right" href="{{url('/dashboard')}}">Dashboard &raquo;</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">Written at {{ $post->created_at->diffForHumans() }} by <a href="{{url('/users/'.$post->user->id)}}">{{$post->user->name}}</a></p>
                <hr>
                @if(!is_null($post))
                    <form action="{{ url('/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input class="form-control" type="text" name="title" value="{{$post->title}}" placeholder="Put the post title here!" required />
                            <small class="form-text text-muted">Title is required</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Post Description</label>
                            <input class="form-control" type="text" name="description" value="{{$post->description}}" placeholder="Put the post description here!" required />
                            <small class="form-text text-muted">Description is required</small>
                        </div>
                        <div class="form-group">
                            <label for="body">Post Content</label>
                            <textarea id="editor" class="form-control" name="body" required>
                                {{$post->description}}
                            </textarea>
                            <small class="form-text text-muted">Content is required</small>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="cover_image">
                                <label class="custom-file-label" for="cover_image" aria-describedby="">Post Cover Image (optional)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        let editorid = document.querySelector( '#editor' )
        
        window.ClassicEditor
        .create( editorid )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>

@endsection