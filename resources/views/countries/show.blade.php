@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4 shadow-sm">
                <img class="card-img-top" width="100px" src="{{asset('storage/posts/default.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4>{{$country->name}}</h4>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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

        </div>
    </div>
@endsection