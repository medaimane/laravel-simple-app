@extends('layouts.app')

@section('content')
    <div class="container">

        @guest
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Blog App</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="route('login')" class="btn btn-primary my-2">Login</a>
                    <a href="route('register')" class="btn btn-secondary my-2">Register</a>
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

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/posts/'.$posts[0]->cover_image)}}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/posts/'.$posts[1]->cover_image)}}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/posts/'.$posts[2]->cover_image)}}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div> <!--/.container -->
@endsection
