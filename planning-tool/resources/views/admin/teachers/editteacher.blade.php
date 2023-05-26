@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @include('partials.error')

    @yield('navigation')

    @if(session('forminput'))
        <div class="alert alert-success" role="alert">
            Zoekertje aangemaakt met titel : {{ session('forminput') }}
        </div>
    @endif


    <div class="container-md">
        <form method="post" action="{{route('teacherupdate')}}">
            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" value="{{ $teacher->firstName }}" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" value="{{ $teacher->lastName }}" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" value="{{ $teacher->email }}" name="email">
            </div>
            @csrf
            <input type="text" class="form-control" id="password" name="password" value="basepassword" hidden>
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@show
