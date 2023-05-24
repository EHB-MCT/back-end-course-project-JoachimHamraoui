@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @yield('navigation')

    <div class="container-md">
        <form method="post" action="{{route('userupdate')}}">
            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" value="{{ $user->firstName }}" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" value="{{ $user->lastName }}" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" value="{{ $user->email }}" name="email">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-select" aria-label="Default select example" name="role" id="role">
                    <option selected>{{ $user->role }}</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@show
