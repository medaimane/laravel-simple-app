@extends('layouts.app')

@section('content')
    <div class="container">

        @guest
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Blog App</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="{{route('login')}}" class="btn btn-primary my-2">Login</a>
                    <a href="{{route('register')}}" class="btn btn-secondary my-2">Register</a>
                </p>
            </div>
        </section>
        @else
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"><small class="text-muted">Blogger</small> {{Auth::user()->name}} <small class="text-muted">from {{Auth::user()->country->name}}</small></h1>
                <p class="lead text-muted">Written {{count(Auth::user()->posts)}} posts on {{Auth::user()->created_at->diffForHumans()}}</p>
                <p>
                    <a href="{{route('dashboard')}}" class="btn btn-success my-2">Go To Dashboard</a>
                </p>
            </div>
        </section>
        @endguest


        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

        <!-- START THE FEATURETTES -->

        {{-- <hr class="featurette-divider"> --}}

        @if (count($posts) > 0)
         @foreach ($posts as $post)
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">{{$post->title}}</h2>
                    <h4><span class="text-muted">{{$post->description}}</span></h4>
                    <p class="lead">{!!$post->body!!}</p>
                </div>
                <div class="col-md-5 mt-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/posts/'.$post->cover_image)}}" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">
         @endforeach
        @endif
        <!-- /END THE FEATURETTES -->

    </div> <!--/.container -->
@endsection
