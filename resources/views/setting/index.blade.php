@extends('layout.app')
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Menu Details</h4>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                                <a href="{{ route('setting.create') }}"><button class="btn bg-primary-subtle text-primary"><i
                                            class="fas fa-plus me-1"></i>Create
                                        Setting</button></a>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>vale</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($rows)
                                        @php($i = 1)
                                        @foreach ($rows as $row)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->value }}</td>
                                                <td class="text-end">
                                                    <a href="{{ route('setting.edit', $row->id) }}"
                                                        class="text-secondary me-2">
                                                        <i class="las la-pen fs-18"></i>
                                                    </a>
                                                    @if ($row->is_superadmin == 0)
                                                        <form action="{{ route('setting.destroy', $row->id) }}" method="POST"
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
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
