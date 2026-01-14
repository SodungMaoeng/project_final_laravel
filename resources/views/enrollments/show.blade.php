@extends('layout.app')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Enrollment Details</h4>
                            <p class="text-muted mb-0">Enrollment ID: #{{ $enrollment->id }}</p>
                        </div>
                        <div class="col-auto">
                            <div class="btn-group">
                                <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-primary">
                                    <i class="iconoir-edit-pencil me-1"></i> Edit
                                </a>
                                <a href="{{ route('enrollments.index') }}" class="btn btn-sm btn-light">
                                    <i class="iconoir-arrow-left me-1"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--end card-header-->

                <div class="card-body">
                    <div class="row">
                        <!-- Student Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Student Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        @if($enrollment->student->profile_image)
                                            <img src="{{ asset('storage/' . $enrollment->student->profile_image) }}"
                                                 class="rounded-circle me-3" width="60" height="60"
                                                 alt="{{ $enrollment->student->name }}">
                                        @else
                                            <div class="rounded-circle me-3 bg-primary-subtle d-flex align-items-center justify-content-center"
                                                 style="width: 60px; height: 60px;">
                                                <span class="text-primary fw-bold" style="font-size: 1.5rem;">
                                                    {{ substr($enrollment->student->name, 0, 1) }}
                                                </span>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="mb-0">{{ $enrollment->student->name }}</h4>
                                            <p class="text-muted mb-0">{{ $enrollment->student->email }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mb-1"><strong>Student ID:</strong></p>
                                            <p class="text-muted">{{ $enrollment->student->student_id ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1"><strong>Phone:</strong></p>
                                            <p class="text-muted">{{ $enrollment->student->phone ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="mb-1"><strong>Status:</strong></p>
                                            <span class="badge bg-{{ $enrollment->student->status == 'active' ? 'success' : 'danger' }}-subtle text-{{ $enrollment->student->status == 'active' ? 'success' : 'danger' }}">
                                                {{ ucfirst($enrollment->student->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Course Information</h5>
                                </div>
                                <div class="card-body">
                                    <h4 class="mb-2">{{ $enrollment->course->title }}</h4>
                                    <p class="text-muted mb-3">{{ $enrollment->course->short_description }}</p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mb-1"><strong>Category:</strong></p>
                                            <span class="badge bg-secondary-subtle text-secondary">
                                                {{ $enrollment->course->category }}
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1"><strong>Level:</strong></p>
                                            <span class="badge bg-info-subtle text-info">
                                                {{ ucfirst($enrollment->course->level) }}
                                            </span>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p class="mb-1"><strong>Duration:</strong></p>
                                            <p class="text-muted">{{ $enrollment->course->duration ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enrollment Details -->
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Enrollment Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-1"><strong>Enrollment Date:</strong></p>
                                            <p class="text-muted">{{ $enrollment->enrollment_date->format('F d, Y') }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="mb-1"><strong>Status:</strong></p>
                                            <span class="badge bg-{{ $enrollment->status_color }}-subtle text-{{ $enrollment->status_color }}">
                                                {{ ucfirst($enrollment->status) }}
                                            </span>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="mb-1"><strong>Progress:</strong></p>
                                            <div class="d-flex align-items-center">
                                                <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                                    <div class="progress-bar bg-{{ $enrollment->progress_color }}"
                                                         style="width: {{ $enrollment->progress }}%">
                                                    </div>
                                                </div>
                                                <span class="fw-bold">{{ $enrollment->progress }}%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="mb-1"><strong>Grade:</strong></p>
                                            @if($enrollment->grade)
                                                <span class="badge bg-primary-subtle text-primary fs-5">
                                                    {{ $enrollment->grade }}%
                                                </span>
                                            @else
                                                <span class="text-muted">Not graded</span>
                                            @endif
                                        </div>

                                        @if($enrollment->completion_date)
                                            <div class="col-md-3 mt-3">
                                                <p class="mb-1"><strong>Completion Date:</strong></p>
                                                <p class="text-muted">{{ $enrollment->completion_date->format('F d, Y') }}</p>
                                            </div>
                                        @endif

                                        @if($enrollment->duration)
                                            <div class="col-md-3 mt-3">
                                                <p class="mb-1"><strong>Duration:</strong></p>
                                                <p class="text-muted">{{ $enrollment->duration }} days</p>
                                            </div>
                                        @endif

                                        @if($enrollment->notes)
                                            <div class="col-12 mt-3">
                                                <p class="mb-1"><strong>Notes:</strong></p>
                                                <div class="bg-light p-3 rounded">
                                                    {{ $enrollment->notes }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex gap-2">
                                @if($enrollment->status !== 'completed')
                                    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="btn btn-success">
                                            <i class="iconoir-check-circle me-1"></i> Mark as Completed
                                        </button>
                                    </form>
                                @endif

                                @if($enrollment->status !== 'dropped')
                                    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="dropped">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="iconoir-cancel me-1"></i> Mark as Dropped
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                                      class="d-inline" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                        <i class="iconoir-trash me-1"></i> Delete Enrollment
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
@endsection

@push('scripts')
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This enrollment will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
@endpush
