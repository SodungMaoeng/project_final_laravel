@extends('layout.app')
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Students</h4>
                                <p class="text-muted mb-0">Total Students: {{ $students->count() }}</p>
                            </div><!--end col-->
                            <div class="col-auto">
                                <form class="row g-2">
                                    <div class="col-auto">
                                        <a class="btn bg-primary-subtle text-primary dropdown-toggle d-flex align-items-center arrow-none"
                                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                            aria-expanded="false" data-bs-auto-close="outside">
                                            <i class="iconoir-filter-alt me-1"></i> Filter
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-start">
                                            <div class="p-2">
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input filter-checkbox" checked id="filter-all" value="all">
                                                    <label class="form-check-label" for="filter-all">
                                                        All
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input filter-checkbox" checked id="filter-active" value="active">
                                                    <label class="form-check-label" for="filter-active">
                                                        Active
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input filter-checkbox" checked id="filter-inactive" value="inactive">
                                                    <label class="form-check-label" for="filter-inactive">
                                                        Inactive
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input filter-checkbox" checked id="filter-completed" value="completed">
                                                    <label class="form-check-label" for="filter-completed">
                                                        Completed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-auto">
                                        <a href="{{ route('students.create') }}" class="btn btn-primary">
                                            <i class="iconoir-plus-circle me-1"></i> Add Student
                                        </a>
                                    </div>
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="iconoir-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="iconoir-warning-triangle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table mb-0 checkbox-all" id="students-table">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 16px;">
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" name="select-all" id="select-all">
                                            </div>
                                        </th>
                                        <th class="ps-0">Student Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Enrolled Courses</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($students as $student)
                                        <tr class="student-row" data-status="{{ strtolower($student->status) }}">
                                            <td style="width: 16px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input student-checkbox" name="check[]" value="{{ $student->id }}">
                                                </div>
                                            </td>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center">
                                                    @if($student->profile_image)
                                                        <img src="{{ asset('storage/' . $student->profile_image) }}"
                                                             alt="{{ $student->name }}"
                                                             class="thumb-md d-inline rounded-circle me-2">
                                                    @else
                                                        <div class="thumb-md d-inline rounded-circle me-2 bg-primary-subtle d-flex align-items-center justify-content-center">
                                                            <span class="fw-bold text-primary">{{ substr($student->name, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0 font-14 fw-medium">{{ $student->name }}</h6>
                                                        <small class="text-muted">ID: {{ $student->student_id ?? 'N/A' }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $student->email }}" class="d-inline-block align-middle mb-0 text-body">
                                                    {{ $student->email }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($student->phone)
                                                    <a href="tel:{{ $student->phone }}" class="text-body">{{ $student->phone }}</a>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($student->enrollments && $student->enrollments->count() > 0)
                                                    <div class="enrolled-courses">
                                                        @foreach($student->enrollments->take(2) as $enrollment)
                                                            <span class="badge bg-light text-dark mb-1 me-1">
                                                                {{ $enrollment->course->title ?? 'Unknown Course' }}
                                                            </span>
                                                        @endforeach
                                                        @if($student->enrollments->count() > 2)
                                                            <span class="badge bg-secondary-subtle text-secondary">
                                                                +{{ $student->enrollments->count() - 2 }} more
                                                            </span>
                                                        @endif
                                                        <br>
                                                        <small class="text-muted">
                                                            Total: {{ $student->enrollments->count() }} courses
                                                        </small>
                                                    </div>
                                                @else
                                                    <span class="badge bg-warning-subtle text-warning">No enrollments</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($student->enrollments && $student->enrollments->count() > 0)
                                                    @php
                                                        $completed = $student->enrollments->where('status', 'completed')->count();
                                                        $total = $student->enrollments->count();
                                                        $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;
                                                    @endphp
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                             style="width: {{ $percentage }}%"
                                                             aria-valuenow="{{ $percentage }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <small class="text-muted">{{ $percentage }}%</small>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $statusColors = [
                                                        'active' => 'success',
                                                        'inactive' => 'danger',
                                                        'completed' => 'primary',
                                                        'pending' => 'warning',
                                                        'suspended' => 'secondary'
                                                    ];
                                                    $color = $statusColors[strtolower($student->status)] ?? 'secondary';
                                                @endphp
                                                <span class="badge bg-{{ $color }}-subtle text-{{ $color }}">
                                                    {{ ucfirst($student->status) }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="iconoir-menu-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('students.show', $student->id) }}">
                                                                <i class="iconoir-eye me-2"></i> View Details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('students.edit', $student->id) }}">
                                                                <i class="iconoir-edit-pencil me-2"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('students.enrollments', $student->id) }}">
                                                                <i class="iconoir-book-stack me-2"></i> View Enrollments
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form id="delete-form-{{ $student->id }}"
                                                                  action="{{ route('students.destroy', $student->id) }}"
                                                                  method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="dropdown-item text-danger"
                                                                        onclick="confirmDelete({{ $student->id }})">
                                                                    <i class="iconoir-trash me-2"></i> Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="iconoir-users-group icon-lg mb-3"></i>
                                                    <h5>No students found</h5>
                                                    <p>Add your first student to get started</p>
                                                    <a href="{{ route('students.create') }}" class="btn btn-primary">
                                                        <i class="iconoir-plus-circle me-1"></i> Add Student
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if($students->hasPages())
                                <div class="card-footer">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted">
                                                Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            {{ $students->links() }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all checkbox functionality
            const selectAllCheckbox = document.getElementById('select-all');
            const studentCheckboxes = document.querySelectorAll('.student-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                studentCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Filter functionality
            const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
            const studentRows = document.querySelectorAll('.student-row');

            filterCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkedFilters = Array.from(filterCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);

                    // If "all" is checked, show all rows
                    if (checkedFilters.includes('all')) {
                        studentRows.forEach(row => row.style.display = '');
                        return;
                    }

                    // Filter rows based on selected statuses
                    studentRows.forEach(row => {
                        const rowStatus = row.getAttribute('data-status');
                        if (checkedFilters.length === 0 || checkedFilters.includes(rowStatus)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });

            // Initialize DataTable if needed
            if ($.fn.DataTable) {
                $('#students-table').DataTable({
                    pageLength: 10,
                    responsive: true,
                    order: [[1, 'asc']],
                    columnDefs: [
                        { orderable: false, targets: [0, 7] },
                        { searchable: false, targets: [0, 5, 6, 7] }
                    ],
                    language: {
                        search: "Search student:",
                        lengthMenu: "Show _MENU_ entries"
                    }
                });
            }
        });

        function confirmDelete(studentId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${studentId}`).submit();
                }
            });
        }

        // Bulk actions
        function handleBulkAction(action) {
            const selectedIds = Array.from(document.querySelectorAll('.student-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No selection',
                    text: 'Please select at least one student.'
                });
                return;
            }

            let url = '';
            let method = 'POST';
            let data = { student_ids: selectedIds };

            switch (action) {
                case 'activate':
                    url = '{{ route("students.bulk.activate") }}';
                    break;
                case 'deactivate':
                    url = '{{ route("students.bulk.deactivate") }}';
                    break;
                case 'delete':
                    url = '{{ route("students.bulk.delete") }}';
                    method = 'DELETE';
                    break;
                default:
                    return;
            }

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong!'
                });
            });
        }
    </script>
@endpush

@push('styles')
    <style>
        .thumb-md {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }

        .progress-sm {
            height: 6px;
            width: 80px;
            display: inline-block;
        }

        .enrolled-courses .badge {
            font-size: 0.7rem;
        }

        .dropdown-menu {
            min-width: 180px;
        }

        .dataTables_wrapper {
            padding: 0;
        }

        .dataTables_length,
        .dataTables_filter {
            padding: 1rem;
            margin: 0;
        }

        .dataTables_info {
            padding: 1rem;
            margin: 0;
        }

        .pagination {
            margin: 0;
        }
    </style>
@endpush
