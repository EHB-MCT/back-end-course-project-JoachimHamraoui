@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <div class="grid gap-2">

            @foreach($sessions as $session)

                <div class="g-col-6 mb-3">
                    <a href="{{ route('lesson', ['id' => $session->course->id])  }}"><h3 class="text-primary"><strong>{{ $session->course->name }}</strong></h3></a>
                    <h4>Session {{ $session->sessionOfCourse}}</h4>
                    <h5>{{ $session['location'] }}</h5>
                    <h6>{{$session['startTime']}} - {{ $session['endTime'] }}</h6>
                    <p>{{ $session['date'] }}</p>
                    <a href="{{ route('sessionedit', ['id' => $session->id]) }}" class="btn btn-success btn-md success col-2" >Edit</a>
                    <a href="{{ route('sessiondelete', ['id' => $session->id]) }}" class="btn btn-danger btn-xs success col-2" >Delete</a>
                </div>
            @endforeach
        </div>
    </div>

@show
