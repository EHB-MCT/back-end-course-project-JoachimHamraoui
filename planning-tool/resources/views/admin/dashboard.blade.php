@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4">Dashboard</h1>
        <h4>As an administrator, you have some rights other users don't</h4>
        <h4>The rights include :</h4>
        <h4>Create</h4>
        <h4>Edit</h4>
        <h4>Delete</h4>
        <h4>Users, courses and the planning.</h4>
    </div>

@show
