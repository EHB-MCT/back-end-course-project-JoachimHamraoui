@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @yield('navigation')

    <div class="container-md">
        <form method="post" action="{{route('postcreatecourse')}}">
            <div class="form-group">
                <label for="name">Course</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="teacher">Teacher</label>
                <select class="form-select" aria-label="default select example" name="teacher" id="teacher">
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->firstName }} {{ $teacher->lastName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <select class="form-select" aria-label="default select example" name="semester" id="semester">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nrSessions"># Sessions</label>
                <input type="number" class="form-control" id="nrSessions" name="nrSessions" min="1" max="9">
            </div>
            <input type="text" class="form-control" id="sessionLength" name="sessionLength" value="4" hidden>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@show
