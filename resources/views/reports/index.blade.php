@extends('layouts.app')
@section('title', 'Callsign - Prismax')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- Statistics Card -->
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{$lastheard_count}}</h4>
                                <p class="card-text font-small-3 mb-0">Activity</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                                <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{$callsign_count}}</h4>
                                <p class="card-text font-small-3 mb-0">Callsigns</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                            <div class="avatar bg-light-danger me-2">
                                <div class="avatar-content">
                                <i data-feather="box" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{$master_count}}</h4>
                                <p class="card-text font-small-3 mb-0">Masters</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                <i data-feather="radio" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{$live_count}}</h4>
                                <p class="card-text font-small-3 mb-0">Live</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--/ Statistics Card -->

                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">List Master</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Repeat</th>
                                    <th>DMR ID</th>
                                    <th>TX</th>
                                    <th>RX</th>
                                    <th>Slot</th>
                                    <th>Software ID</th>
                                    <th>Package ID</th>
                                    <th>CC</th>
                                    <th>Callsign</th>
                                    <th>Location</th>
                                    <th>Connection</th>
                                    <th>Connected</th>
                                    <th>IP</th>
                                    <th>Port</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form class="add-new-user modal-content pt-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Callsign</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-name_callsign">Name</label>
                                        <input type="text" id="basic-icon-default-name_callsign" class="form-control dt-uname" placeholder="John Doe" name="user-name_callsign" required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-callsign">Callsign</label>
                                        <input type="text" id="basic-icon-default-callsign" class="form-control dt-uname" placeholder="M3HPZ" name="user-callsign" required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-email_callsign">Email</label>
                                        <input type="email" id="basic-icon-default-email_callsign" class="form-control dt-email" placeholder="john.doe@mag.net.id" name="user-email_callsign" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            if ($.fn.DataTable.isDataTable('.user-list-table')) {
                                $('.user-list-table').DataTable().destroy();
                            }

                            // Tangkap form submit event
                            $('.add-new-user').submit(function(e) {
                                e.preventDefault(); // Mencegah form submit default
                    
                                // Ambil data dari form
                                var name = $('#basic-icon-default-name_callsign').val();
                                var callsign = $('#basic-icon-default-callsign').val();
                                var email = $('#basic-icon-default-email_callsign').val();
                                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    
                                // Tampilkan konfirmasi SweetAlert2
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'Do you want to submit this form?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes',
                                    cancelButtonText: 'No'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Kirim data ke server
                                        $.ajax({
                                            url: '/callsign/store', // Ganti dengan URL rute Anda
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            data: {
                                                // _token: csrfToken,
                                                name: name,
                                                callsign: callsign,
                                                email: email
                                            },
                                            success: function(response) {
                                                // Membersihkan formulir setelah berhasil menambahkan data
                                                $('.add-new-user')[0].reset();
                    
                                                // Tampilkan pesan sukses menggunakan SweetAlert2
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'Callsign has been added successfully.',
                                                    icon: 'success',
                                                    confirmButtonText: 'OK'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Tutup modal jika diperlukan
                                                        $('#modals-slide-in').modal('hide');
                                                        // Muat ulang tabel jika perlu
                                                        // ...
                                                    }
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                // Tangani kesalahan jika terjadi
                                                console.error(xhr.responseText);
                                                // Tampilkan pesan error kepada pengguna
                                                // ...
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Failed to add callsign. Please try again later.',
                                                    icon: 'error',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        });
                                    }
                                });
                            });
                        });
                    </script>
                    <!-- Modal to add new user Ends-->
                </div>
                <!-- list and filter end -->

                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">List Callsign</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Repeat</th>
                                    <th>DMR ID</th>
                                    <th>TX</th>
                                    <th>RX</th>
                                    <th>Slot</th>
                                    <th>Software ID</th>
                                    <th>Package ID</th>
                                    <th>CC</th>
                                    <th>Callsign</th>
                                    <th>Location</th>
                                    <th>Connection</th>
                                    <th>Connected</th>
                                    <th>IP</th>
                                    <th>Port</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form class="add-new-user modal-content pt-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Callsign</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-name_callsign">Name</label>
                                        <input type="text" id="basic-icon-default-name_callsign" class="form-control dt-uname" placeholder="John Doe" name="user-name_callsign" required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-callsign">Callsign</label>
                                        <input type="text" id="basic-icon-default-callsign" class="form-control dt-uname" placeholder="M3HPZ" name="user-callsign" required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-email_callsign">Email</label>
                                        <input type="email" id="basic-icon-default-email_callsign" class="form-control dt-email" placeholder="john.doe@mag.net.id" name="user-email_callsign" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            if ($.fn.DataTable.isDataTable('.user-list-table')) {
                                $('.user-list-table').DataTable().destroy();
                            }

                            // Tangkap form submit event
                            $('.add-new-user').submit(function(e) {
                                e.preventDefault(); // Mencegah form submit default
                    
                                // Ambil data dari form
                                var name = $('#basic-icon-default-name_callsign').val();
                                var callsign = $('#basic-icon-default-callsign').val();
                                var email = $('#basic-icon-default-email_callsign').val();
                                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    
                                // Tampilkan konfirmasi SweetAlert2
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'Do you want to submit this form?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes',
                                    cancelButtonText: 'No'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Kirim data ke server
                                        $.ajax({
                                            url: '/callsign/store', // Ganti dengan URL rute Anda
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            data: {
                                                // _token: csrfToken,
                                                name: name,
                                                callsign: callsign,
                                                email: email
                                            },
                                            success: function(response) {
                                                // Membersihkan formulir setelah berhasil menambahkan data
                                                $('.add-new-user')[0].reset();
                    
                                                // Tampilkan pesan sukses menggunakan SweetAlert2
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'Callsign has been added successfully.',
                                                    icon: 'success',
                                                    confirmButtonText: 'OK'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Tutup modal jika diperlukan
                                                        $('#modals-slide-in').modal('hide');
                                                        // Muat ulang tabel jika perlu
                                                        // ...
                                                    }
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                // Tangani kesalahan jika terjadi
                                                console.error(xhr.responseText);
                                                // Tampilkan pesan error kepada pengguna
                                                // ...
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Failed to add callsign. Please try again later.',
                                                    icon: 'error',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        });
                                    }
                                });
                            });
                        });
                    </script>
                    <!-- Modal to add new user Ends-->
                </div>
                <!-- list and filter end -->

            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">

    <link rel="stylesheet" href="{{asset('prismax/vuexy/app-assets/vendors/css/extensions/sweetalert2.min.css')}}" />
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/plugins/forms/form-validation.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
@endsection

@section('js')

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')}}"></script>

    <!-- Vendors JS -->
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('prismax/vuexy/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('prismax/vuexy/app-assets/data/report/app-master-list.js')}}"></script>
    {{-- <script src="{{asset('prismax/vuexy/assets/js/extended-ui-sweetalert2.js')}}"></script> --}}
    <!-- END: Page JS-->
@endsection