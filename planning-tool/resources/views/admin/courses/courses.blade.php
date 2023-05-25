@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section("content")

    @yield('navigation')

    <div class="container-md mt-4">
        <h1 class="mb-4">List of <strong class="text-primary">Courses</strong></h1>

        <div class="grid gap-2">
            @foreach($courses as $course)
                <div class="g-col-6 mb-3">
                    <h3 class="text-primary"><strong>{{ $course->name }}</strong></h3>
                    <h5>{{ $course->description }}</h5>
                    <a href="{{ route('courseedit', ['id' => $course->id]) }}" class="btn btn-success btn-md success col-2" >Edit</a>
                    <a href="{{ route('coursedelete', ['id' => $course->id]) }}" class="btn btn-danger btn-xs success col-2" >Delete</a>
                    <a href="" class="btn btn-light btn-xs light col-2" >Plan</a>
                </div>
            @endforeach
        </div>
        <div class="g-col-6 mb-3">
            <a href="{{ route('coursecreate') }}" class="btn btn-primary btn-xs primary col-2" >Add +</a>
        </div>
    </div>

@show
