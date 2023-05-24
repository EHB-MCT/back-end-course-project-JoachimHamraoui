@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4">List of <strong class="text-primary">Teachers</strong></h1>

        <div class="grid gap-2">

            @foreach($courses as $course)

                <div class="g-col-6 mb-3">
                    <h3 class="text-primary"><strong>{{ $course->firstName }}</strong></h3>
                    <h5>{{ $course->email }}</h5>
                    <a href="{{ route('teacheredit', ['id' => $course->id]) }}" class="btn btn-success btn-md success col-2" >Edit</a>
                    <a href="{{ route('teacherdelete', ['id' => $course->id]) }}" class="btn btn-danger btn-xs success col-2" >Delete</a>

                </div>
            @endforeach
        </div>
        <div class="g-col-6 mb-3">
            <a href="{{ route('teachercreate') }}" class="btn btn-primary btn-xs primary col-2" >Add +</a>
        </div>
    </div>

@show
