@extends('layout.app')

@section('content')
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Course</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-2">
                        <label class="form-label">Title</label>

                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" placeholder="Enter course title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-2">
                        <label class="form-label">Description</label>
                        <input type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                            placeholder="Enter description">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="mb-2">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}" placeholder="Enter price">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Discount --}}
                    <div class="mb-2">
                        <label class="form-label">Discount (%)</label>
                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror"
                            value="{{ old('discount') }}" placeholder="Enter discount">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Video --}}
                    <div class="mb-3">
                        <label class="form-label">Course Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            accept="image/*" onchange="previewImage(event)">

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <img id="preview" class="mt-3 rounded shadow" style="display:none; width:200px;">
                    </div>

                    <script>
                        function previewImage(event) {
                            const img = document.getElementById('preview');
                            img.src = URL.createObjectURL(event.target.files[0]);
                            img.style.display = 'block';
                        }
                    </script>

                    <button type="submit" class="btn btn-primary">
                        Create Course
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewVideo(event) {
            const preview = document.getElementById('videoPreview');
            preview.innerHTML = '';

            const file = event.target.files[0];
            if (!file) return;

            const video = document.createElement('video');
            video.src = URL.createObjectURL(file);
            video.controls = true;
            video.width = 320;
            video.className = 'rounded shadow-sm';

            preview.appendChild(video);

            video.onloadeddata = () => URL.revokeObjectURL(video.src);
        }
    </script>
@endsection
