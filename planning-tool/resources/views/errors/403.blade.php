@section("navigation")
    @include('layouts.nav')
@endsection

@section("content")

    <head>
        <title>Error 403 - Unauthorized</title>
    </head>

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4 font-weight-bold">Error 403</h1>
        <p>You're not authorized to access this page.</p>
        <p>If you are supposed to access the page you're trying to access. <br> Please contact us at backend@ehb.be or joachimhamraoui@gmailcom</p>
    </div>

@show
