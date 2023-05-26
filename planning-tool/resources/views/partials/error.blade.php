@foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <p>{{ $error }}</p>
    </div>
@endforeach
