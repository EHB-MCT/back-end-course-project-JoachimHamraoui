@section("navigation")
    @include('layouts.loginnav')
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
            <input type="password" class="form-control" name="password" id="password">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{ route('login') }}"><button class="btn btn-link">I already have an account</button></a>
</div>
