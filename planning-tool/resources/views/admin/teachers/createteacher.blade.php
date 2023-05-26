@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @yield('navigation')

    @include('partials.error')

    @if(session('forminput'))
        <div class="alert alert-success" role="alert">
            Zoekertje aangemaakt met titel : {{ session('forminput') }}
        </div>
    @endif

    <div class="container-md">
        <form method="post" action="{{route('postteacher')}}">
            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <input type="text" class="form-control" id="password" name="password" value="basepassword" hidden>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@show
