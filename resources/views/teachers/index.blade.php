@extends('layout.app')

@section('content')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-lg-3 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Students</p>
                                <h3 class="mt-2 mb-0 fw-bold">24k</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-danger bg-opacity-10 rounded-circle mx-auto">
                                    <i class="bi bi-people-fill text-danger fs-4"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">8.5%</span>
                            New Sessions Today</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-12 col-sm-6 col-lg-3 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Course</p>
                                <h3 class="mt-2 mb-0 fw-bold">120</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-success bg-opacity-10 rounded-circle mx-auto">
                                    <i class="bi bi-folder-fill text-success fs-4"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">1.5%</span>
                            Weekly Avg.Sessions</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-12 col-sm-6 col-lg-3 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Total Video</p>
                                <h3 class="mt-2 mb-0 fw-bold">888</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center bg-purple  bg-opacity-10 thumb-xl rounded-circle mx-auto "
                                    style="background-color: var(--purple-200)">
                                    <i class="bi bi-play-btn-fill text-purple fs-4"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">8%</span>
                            Up Bounce Rate Weekly</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-12 col-sm-6 col-lg-3 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Total Earning</p>
                                <h3 class="mt-2 mb-0 fw-bold">36.45%</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-warning bg-opacity-10 rounded-circle mx-auto">
                                    <i class="bi bi-cash-coin text-warning fs-4"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">8%</span>
                            Up Bounce Rate Weekly</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>

        {{-- Charts --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Working Activity</h4>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icofont-calendar fs-5 me-1"></i>
                                        This Year<i class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body pt-0">
                        <div id="audience_overview" class="apex-charts"></div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-12 col-lg-4 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Top Courses</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Scott Holland</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3652</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$3325.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Karen Savage</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4789</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$2548.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Steven Sharp </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$2985.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Teresa Himes </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3269</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$1845.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Ralph Denton</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$1422.00</span>
                                        </td>
                                    </tr><!--end tr-->

                                </tbody>
                            </table> <!--end table-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
        <!--end row-->

        {{-- Paid --}}

        <div class="row justify-content-center">
            <div class="col-12 col-lg-4 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Transactions</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Scott Holland</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3652</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">5:15 PM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Karen Savage</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4789</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">1:35 PM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Steven Sharp </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">9:00 AM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Teresa Himes </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3269</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$1845.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Ralph Denton</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">7:45 PM</span>
                                        </td>
                                    </tr><!--end tr-->

                                </tbody>
                            </table> <!--end table-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
            <div class="col-12 col-lg-4 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Transactions</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Scott Holland</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3652</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">5:15 PM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Karen Savage</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4789</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">1:35 PM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Steven Sharp </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">9:00 AM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Teresa Himes </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3269</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$1845.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Ralph Denton</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">7:45 PM</span>
                                        </td>
                                    </tr><!--end tr-->

                                </tbody>
                            </table> <!--end table-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
            <div class="col-12 col-lg-4 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Transactions</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Scott Holland</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3652</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">5:15 PM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Karen Savage</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4789</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">1:35 PM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Steven Sharp </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">9:00 AM</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr class="">
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Teresa Himes </h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#3269</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">$1845.00</span>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td class="px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}"
                                                    height="36" class="me-2 align-self-center rounded" alt="...">
                                                <div class="flex-grow-1 text-truncate">
                                                    <h6 class="m-0 text-truncate">Ralph Denton</h6>
                                                    <a href="#"
                                                        class="font-12 text-muted text-decoration-underline">#4521</a>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </td>
                                        <td class="px-0 text-end"><span
                                                class="text-primary ps-2 align-self-center text-end">7:45 PM</span>
                                        </td>
                                    </tr><!--end tr-->

                                </tbody>
                            </table> <!--end table-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>


        </div>
        <!--end row-->

    </div>

    <!-- end page content -->
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/data/irregular-data-series.js') }}"></script>
    <script src="{{ asset('backend/assets/data/ohlc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/apexcharts.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
@endsection
