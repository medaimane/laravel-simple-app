<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::OrderBy('created_at', 'desc')->paginate(3)
        ];
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'posts' => Post::OrderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->paginate(3)
        ];
        return view('posts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle image file upload
        if($request->hasFile('cover_image')) {
            // Get filename with extension_loaded
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // Upload the file
            $path = $request->file('cover_image')->storeAs('public/posts', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->cover_image = $fileNameToStore;

        if($post->save()) {
            return redirect()->route('dashboard')->with('success', '200 : Post created with success');
        } else {
            return redirect()->route('dashboard')->with('error', '501 : Post can not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $data = [
            'post' => $post
        ];
        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if(is_null($post)) {
            return redirect()->route('posts.show', $post)->with('error', '504 : Post can not updated.');
        }

        // Handle image file upload
        if($request->hasFile('cover_image')) {
            // Get filename with extension_loaded
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // Upload the file
            $path = $request->file('cover_image')->storeAs('public/posts', $fileNameToStore);

            // Set new file
            $post->cover_image = $fileNameToStore;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        
        $post->update();

        return redirect()->route('posts.show', $post)->with('success', 'Post updated with success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        // Check for the correct user
        if(auth()->user()->id != $post->user_id ) {
            return redirect()->route('dashboard')->with('error', 'Unauthorised action');
        }
        
        if($post->cover_image != 'default.jpg') {
            // Delete image
            Storage::delete('storage/posts/'.$post->cover_image);
        }

        if($post->delete()) {
            return redirect()->route('dashboard')->with('success', 'Post deleted with success');
        }
    }
}
