@extends('layouts.app')

@section('content')
   <div class="container">
        <h1>Create Post</h1>
        <hr>
        <div class="card">
            <div class="card-header">
                New Post
                <a class="btn btn-sm btn-outline-primary float-right" href="{{url('/dashboard')}}">Dashboard &raquo;</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                
                <form action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input class="form-control" type="text" name="title" value="" placeholder="Put the post title here!" required />
                        <small class="form-text text-muted">Title is required</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Post Description</label>
                        <input class="form-control" type="text" name="description" value="" placeholder="Put the post description here!" required />
                        <small class="form-text text-muted">Description is required</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Post Content</label>
                        <textarea id="editor" class="form-control" name="body" value="" aria-describedby="" required>
                            Put the post content here! 
                            This is some sample content.
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