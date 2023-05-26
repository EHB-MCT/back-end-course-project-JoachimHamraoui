@section("navigation")
    @include('layouts.admin-nav')
@endsection

@section('content')

    @yield('navigation')

    <div class="container-md">
        <form method="post" action="{{route('posteditplanning')}}">
            <div class="form-group">
                <label for="name">Course</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $session->course->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $session->date }}">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <select class="form-select" aria-label="default select example" name="location" id="location">
                    <option value="{{ $session->location }}" selected>{{ $session->location }}</option>
                    <option value="A101">A101</option>
                    <option value="A103">A103</option>
                    <option value="A108">A108</option>
                    <option value="B101">B101</option>
                    <option value="B103">B103</option>
                    <option value="B108">B108</option>
                    <option value="B201">B201</option>
                    <option value="B205">B205</option>
                    <option value="B208">B208</option>
                </select>
            </div>
            <div class="form-group">
                <label for="startTime">Start Time</label>
                <select class="form-select" aria-label="default select example" name="startTime" id="startTime">
                    <option value="{{ $session->startTime }}" selected>{{ $session->startTime }}</option>
                    <option value="09:00">09:00</option>
                    <option value="14:00">14:00</option>
                </select>
            </div>
            <div class="form-group">
                <label for="endTime">End Time</label>
                <select class="form-select" aria-label="default select example" name="endTime" id="endTime">
                    <option value="{{ $session->endTime }}" selected>{{ $session->endTime }}</option>
                    <option value="13:00">13:00</option>
                    <option value="18:00">18:00</option>
                </select>
            </div>
            <input type="number" class="form-control" id="id" name="id" value="{{ $session->id }}" hidden>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@show
