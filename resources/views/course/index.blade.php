@extends('layout.app')

@section('content')
    <div class="container-xxl">

        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="clearfix">
                    <div class="btn-group float-end ms-2">
                        <a href="{{ route('course.create') }}" class="btn btn-primary">Create Course</a>
                    </div>
                    <ul class="nav nav-tabs my-4" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fw-semibold active py-2" data-bs-toggle="tab" href="#documents"
                                role="tab" aria-selected="true"><i class="fa-regular fa-folder-open me-1"></i>
                                Videos <span
                                    class="badge rounded text-blue bg-blue-subtle ms-1">{{ isset($rows) ? count($rows) : 0 }}</span></a>
                        </li>
                    </ul>
                </div>

                <div class="card-body  pt-0 p-0">
                    <div class="table mb-0 text-center align-middle">
                        <table class="table mb-0" id="datatable_1">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Videos</th>
                                    <th class="text-start fw-bold">Course Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Created At</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($rows)
                                    @php($i = 1)
                                    @foreach ($rows as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                @if ($row->image)
                                                    <img src="{{ asset('storage/' . $row->image) }}" width="140" height="120"
                                                        class="rounded shadow-sm">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>

                                            <td class="text-start fw-bold">{{ $row->title }}</td>
                                            <td>$ {{ number_format($row->price, 2) }}</td>
                                            <td>{{ $row->discount }}%</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('course.edit', $row->id) }}" class="text-secondary me-2">
                                                    <i class="las la-pen fs-18"></i>
                                                </a>
                                                @if ($row->is_superadmin == 0)
                                                    <form action="{{ route('course.destroy', $row->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Do you want to delete?')"
                                                            class="text-secondary border-0 bg-transparent">
                                                            <i class="las la-trash-alt fs-18"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div>
@endsection
