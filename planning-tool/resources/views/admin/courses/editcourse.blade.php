@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @yield('navigation')

    <div class="container-md">
        <form method="post" action="{{route('courseupdate')}}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $course->name }}" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" value="{{ $course->description }}" name="description">
            </div>
            <div class="form-group">
                <label for="teacher">Teacher</label>
               <select class="form-select" aria-label="default select example" name="teacher" id="teacher">
                   @foreach($teachers as $teacherid)
                       <option value="{{ $teacherid->id }}">{{ $teacherid->firstName }} {{ $teacherid->lastName }}</option>
                   @endforeach
               </select>
            </div>
            @csrf
            <input type="hidden" name="id" value="{{ $course->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@show
