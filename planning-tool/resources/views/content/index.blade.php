@section("navigation")
    @include('layouts.nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4">Your planning, <strong class="text-primary">Username</strong></h1>

        <div class="grid gap-2">

            @foreach($plannings as $planning)
                <div class="g-col-6 mb-3">
                    <h3 class="text-primary"><strong>{{ $planning['course_id'] }}</strong></h3>
                    <h5>Professor: <strong>{{ $planning['course_id'] }}</strong></h5>
                    <p>{{ $planning['date'] }}</p>
                    <p>{{ $planning['location'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

@show
