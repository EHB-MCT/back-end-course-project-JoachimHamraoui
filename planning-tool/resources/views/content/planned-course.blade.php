@section("navigation")
    @include('layouts.nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4">Your planning, <strong class="text-primary">{{ $firstName }}</strong></h1>

        <div class="grid gap-2">

                <div class="g-col-12 mb-3">
                    <h3 class="text-primary"><strong>{{ $coursedetails['name'] }}</strong></h3>
                    <h5>Professor: <strong>{{ $courseteacher['firstName'] }} {{ $courseteacher['lastName'] }}</strong></h5>
                    <p>{{ $plannedcourse['date'] }}</p>
                    <p>{{ $plannedcourse['location'] }}</p>
                </div>
        </div>
    </div>

@show
