@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @foreach ($roles as $role)
                <li>{{$role->name}}</li>
                <li>{{$role->description}}</li>
                <hr>
        
                <div>
                    <ul>
                        @foreach ($role->users as $user)
                            <li>{{$user->name}}</li>
        
                            <hr>
                            <div>
                                <ul>
                                    @foreach ($user->posts as $post)
                                        <li>{{$post->title}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </ul>
    </div>
@endsection