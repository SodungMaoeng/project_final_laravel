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
                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" placeholder="Enter course title" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="3" placeholder="Enter course description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                        <option value="">Select Category</option>
                        <option value="marketing" {{ old('category') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="technology" {{ old('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                        <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Business</option>
                        <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>Design</option>
                        <option value="personal" {{ old('category') == 'personal' ? 'selected' : '' }}>Personal Development</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label">Price *</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="price" step="0.01" min="0"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}" placeholder="Enter price" required>
                    </div>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Discount --}}
                <div class="mb-3">
                    <label class="form-label">Discount (%)</label>
                    <div class="input-group">
                        <input type="number" name="discount" min="0" max="100"
                            class="form-control @error('discount') is-invalid @enderror"
                            value="{{ old('discount', 0) }}" placeholder="Enter discount">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('discount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Course Image --}}
                <div class="mb-3">
                    <label class="form-label">Course Image *</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        accept="image/*" onchange="previewImage(event)" required>

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="mt-2">
                        <small class="text-muted">Recommended size: 800x400px. Max file size: 2MB</small>
                    </div>

                    <img id="preview" class="mt-3 rounded shadow" style="display:none; max-width:100%; height:200px; object-fit:cover;">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-2"></i>Create Course
                    </button>
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const img = document.getElementById('preview');
        if (event.target.files.length > 0) {
            img.src = URL.createObjectURL(event.target.files[0]);
            img.style.display = 'block';
        } else {
            img.style.display = 'none';
        }
    }
</script>
@endsection
