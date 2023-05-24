@section("navigation")
    @include('layouts.nav')
@endsection

@section("content")

    <head>
        <title>Error 404 - Not Found</title>
    </head>

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4 font-weight-bold">Error 404</h1>
        <p>The page you're looking for does not exist.</p>
    </div>

@show
