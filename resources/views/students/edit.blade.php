@extends('layout.app')
@section('content')
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $menu) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- role --}}
                    <div class="mb-2">

                        {{-- name --}}
                        <div class="mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" name="title" placeholder="Enter your title"
                                required value="{{ $menu->title ?? old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- subtitle --}}
                        <div class="mb-2">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input class="form-control" type="text" name="subtitle" placeholder="Enter subtitle"
                                value="{{ $menu->subtitle ?? old('subtitle') }}">
                            @error('subtitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- description --}}
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <input class="form-control" type="text" name="description" placeholder="Enter description"
                                value="{{ $menu->description ?? old('description') }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Edit Menu</button>

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
