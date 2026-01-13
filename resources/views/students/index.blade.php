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
                                                    <input type="checkbox" class="form-check-input" checked id="filter-all">
                                                    <label class="form-check-label" for="filter-all">
                                                        All
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-one">
                                                    <label class="form-check-label" for="filter-one">
                                                        New
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-two">
                                                    <label class="form-check-label" for="filter-two">
                                                        Processing
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked
                                                        id="filter-three">
                                                    <label class="form-check-label" for="filter-three">
                                                        Completed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">

                        <div class="table-responsive">
                            <table class="table mb-0 checkbox-all" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 16px;">
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" name="select-all"
                                                    id="select-all">
                                            </div>
                                        </th>
                                        <th class="ps-0">Student Name</th>
                                        <th>Email</th>
                                        <th>Enroll Course</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 16px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="check"
                                                    id="customCheck1">
                                            </div>
                                        </td>
                                        <td class="ps-0">
                                            <img src="{{ asset('backend/assets/images/users/avatar-2.jpg
                                            ') }}"
                                                alt="" class="thumb-md d-inline rounded-circle me-1">
                                            <p class="d-inline-block align-middle mb-0">
                                                <span class="font-13 fw-medium">Andy Timmons</span>
                                            </p>
                                        </td>
                                        <td><a href="#"
                                                class="d-inline-block align-middle mb-0 text-body">dummy@dummy.com</a> </td>
                                        <td>UX UI Design</td>
                                        <td><span class="badge bg-danger-subtle text-danger">New</span></td>

                                        <td class="text-end">
                                            <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                            <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
@endsection
