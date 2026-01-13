@extends('layout.app')
@section('content')
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Course</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- title --}}
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Enter course title" required
                            value="{{ old('title', $course->title) }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- description --}}
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter course description" cols="30" rows="3">{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- price --}}
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input class="form-control" type="number" step="0.01" name="price" placeholder="Enter price"
                            required value="{{ old('price', $course->price) }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- discount --}}
                    <div class="mb-2">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input class="form-control" type="number" name="discount" placeholder="Enter discount"
                            value="{{ old('discount', $course->discount) }}">
                        @error('discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- start_date --}}
                    <div class="mb-2">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input class="form-control" type="date" name="start_date" value="{{ old('start_date', $course->start_date ? $course->start_date->format('Y-m-d') : '') }}">
                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- video --}}
                    <div class="mb-2">
                        <label for="video" class="form-label">Video</label>
                        @if($course->video)
                            <div class="mb-2">
                                <video width="300" controls>
                                    <source src="{{ asset($course->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                        <input type="file" class="form-control" name="video" accept="video/*"
                            onchange="loadFile(event)">
                        <div id="output" class="mt-2 text-muted">{{ $course->video ? 'Current video will be replaced if you upload a new one.' : 'No video selected.' }}</div>
                        @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.innerHTML = '';
            var url = URL.createObjectURL(event.target.files[0]);
            var video = document.createElement('video');
            video.className = 'mt-2';
            video.width = 300;
            video.controls = true;
            var source = document.createElement('source');
            source.src = url;
            source.type = 'video/mp4';
            video.appendChild(source);
            video.innerHTML += 'Your browser does not support the video tag.';
            output.appendChild(video);
            // Clean up
            video.onloadeddata = function() {
                URL.revokeObjectURL(url);
            };
        };
    </script>
@endsection
