@extends('layout.app')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">New Enrollment</h4>
                            <p class="text-muted mb-0">Enroll a student in a course</p>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('enrollments.index') }}" class="btn btn-sm btn-light">
                                <i class="iconoir-arrow-left me-1"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div><!--end card-header-->

                <div class="card-body">
                    <form action="{{ route('enrollments.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Student <span class="text-danger">*</span></label>
                                    <select class="form-select @error('student_id') is-invalid @enderror"
                                            name="student_id" required>
                                        <option value="">Select Student</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}"
                                                    {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                                {{ $student->name }} ({{ $student->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('student_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Course <span class="text-danger">*</span></label>
                                    <select class="form-select @error('course_id') is-invalid @enderror"
                                            name="course_id" required>
                                        <option value="">Select Course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}"
                                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                                {{ $course->title }} ({{ $course->category }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Enrollment Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('enrollment_date') is-invalid @enderror"
                                           name="enrollment_date" value="{{ old('enrollment_date', date('Y-m-d')) }}" required>
                                    @error('enrollment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                              name="notes" rows="3">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="iconoir-save me-1"></i> Create Enrollment
                                </button>
                                <button type="reset" class="btn btn-light">Reset</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
@endsection
