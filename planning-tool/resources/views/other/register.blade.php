@section("navigation")
    @include('layouts.nav')
@show

@include('partials.error')

@if(session('forminput'))
    <div class="alert alert-success" role="alert">
        Zoekertje aangemaakt met titel : {{ session('forminput') }}
    </div>
@endif

<div class="container-md mt-4">
    <form method="post" action="{{route('usercreate')}}">
        <div class="form-group">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" id="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" id="lastName">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
