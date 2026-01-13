@extends('layout.app')
@section('content')
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- role --}}
                    <div class="mb-2">

                        {{-- name  --}}
                        <div class="mb-2">
                            <label for="name" class="form-label">Title</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter your name" required
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- title --}}
                        <div class="mb-2">
                            <label for="value" class="form-label">Value</label>
                            <input class="form-control" type="text" name="value" placeholder="Enter your email"
                                required value="{{ old('value') }}">
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-primary">Create setting</button>

                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
