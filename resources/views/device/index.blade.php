@extends('layouts.app')
@section('title', 'Device - Prismax')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{$devices}}</h3>
                                    <span>Total Device</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Search</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    {{-- <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Callsign</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div> --}}

                    <div class="card-datatable table-responsive pt-0">
                        <!-- Checkbox untuk kolom Name dan Callsign -->
                        {{-- <div>
                            <label><input type="checkbox" id="chkName" checked> Name</label>
                            <label><input type="checkbox" id="chkCallsign" checked> Callsign</label>
                        </div> --}}
                        
                        <!-- Tabel -->
                        <table class="user-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Serial Number</th>
                                    <th>Priority</th>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-name_device">Name</label>
                                        <input type="text" id="basic-icon-default-name_device" class="form-control dt-uname" placeholder="Prismax Miu 1" name="user-name_callsign" required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-device">Serial Number</label>
                                        <input type="text" id="basic-icon-default-device" class="form-control dt-uname" placeholder="1fd7ce38" name="user-callsign" required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-email_device">Priority</label>
                                        <select name="basic-icon-default-email_device" id="basic-icon-default-email_device" class="form-control dt-email" required>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
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
                                var name = $('#basic-icon-default-name_device').val();
                                var serial_number = $('#basic-icon-default-device').val();
                                var priority = $('#basic-icon-default-email_device').val();
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
                                            url: '/device/store', // Ganti dengan URL rute Anda
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            data: {
                                                // _token: csrfToken,
                                                name: name,
                                                serial_number: serial_number,
                                                priority: priority
                                            },
                                            success: function(response) {
                                                // Membersihkan formulir setelah berhasil menambahkan data
                                                $('.add-new-user')[0].reset();
                    
                                                // Tampilkan pesan sukses menggunakan SweetAlert2
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'Device has been added successfully.',
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
                                                    text: 'Failed to add device. Please try again later.',
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
    <script src="{{asset('prismax/vuexy/app-assets/data/device/app-device-list.js')}}"></script>
    {{-- <script src="{{asset('prismax/vuexy/assets/js/extended-ui-sweetalert2.js')}}"></script> --}}
    <!-- END: Page JS-->
@endsection