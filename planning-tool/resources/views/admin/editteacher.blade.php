@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @yield('navigation')

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
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@show
