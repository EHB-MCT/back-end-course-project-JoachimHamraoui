@section("navigation")
    @include('layouts.nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4">Your planning, <strong class="text-primary">{{ $firstName }}</strong></h1>

        <div class="grid gap-2">

            @foreach($sessions as $session)

                <div class="g-col-6 mb-3">
                    <a href="{{ route('lesson', ['id' => $session->course->id])  }}"><h3 class="text-primary"><strong>{{ $session->course->name }}</strong></h3></a>
                    <h4>Session {{ $session->sessionOfCourse}}</h4>
                    <h5>{{ $session['location'] }}</h5>
                    <h6>{{$session['startTime']}} - {{ $session['endTime'] }}</h6>
                    <p>{{ $session['date'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

@show
