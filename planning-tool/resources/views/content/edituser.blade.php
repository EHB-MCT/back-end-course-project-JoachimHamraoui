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
    <form method="post" action="{{route('userupdatecourse')}}">
        <div class="form-group">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $user->firstName }}" disabled>
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" id="lastName" value="{{ $user->lastName }}" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" disabled>
        </div>
            <div class="form-row">
                <div class="col">
                    <label for="course1">Course 1</label>
                    <select class="form-select" aria-label="default select example" name="course1" id="course1">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="course2">Course 2</label>
                    <select class="form-select" aria-label="default select example" name="course2" id="course2">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="course1">Course 3</label>
                    <select class="form-select" aria-label="default select example" name="course3" id="course3">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @csrf
            <input type="hidden" class="form-control" name="password" id="password" value="{{ $user->password }}">
            <input type="hidden" name="id" value="{{ $user->id }}" id="id">
            <input type="hidden" name="role" value="{{ $user->role }}" id="role">
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
