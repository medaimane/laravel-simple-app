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
        <h5 class="border-bottom border-gray pb-2 mb-0">More infos - Recent updates</h5>
        
    </div>
</div>
@endsection