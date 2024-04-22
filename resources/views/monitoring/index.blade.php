@extends('layouts.app')
@section('title', 'License - Prismax')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <div class="mb-1">
                    <!-- Default Modal -->
                    <div class="col-lg-4 col-md-6">
                        <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                            Add Master
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add Master</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Name Master</label>
                                    <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Location</label>
                                    <input type="text" id="locationBasic" class="form-control" placeholder="Jakarta">
                                    </div>
                                    <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">DMR ID</label>
                                    <input type="text" id="dmrID" class="form-control" placeholder="D14JF">
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Cards Draggable -->
                <div class="row mb-4" id="sortable-cards">
                    <!-- View sales -->
                    <div class="col-lg-6 order-3 order-xl-0">
                        <div class="card drag-item cursor-move">
                            <div class="card-body">
                                <h5 class="card-title mb-0">MASTER 1 - RPT02 (DMR ID: 210324)</h5>
                                <p class="mb-2">
                                    1h 7m - Kebon Jeruk
                                    <button type="button" class="btn btn-icon btn-primary btn-sm">
                                        <i data-feather="activity"></i>
                                        <span class="ti ti-star"></span>
                                    </button>
                                </p>
                                <div class="row">
                                    <div class="col-6">
                                        <h6>
                                            <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            SLOT 1
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: 100px;">Source</span>: AJF44A 
                                            <br> 
                                            <span style="display:inline-block; width: 100px;">Destination</span>: AJF44A
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>
                                            <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            SLOT 2
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: 100px;">Source</span>: 
                                            <br> 
                                            <span style="display:inline-block; width: 100px;">Destination</span>:
                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="card-body">
                                        <img src="../../prismax/vuexy/assets/images/XIRM8688.png" height="140" alt="view sales">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-3 order-xl-0">
                        <div class="card drag-item cursor-move">
                            <div class="card-body">
                                <h5 class="card-title mb-0">MASTER 1 - RPT02 (DMR ID: 210324)</h5>
                                <p class="mb-2">1h 7m - Kebon Jeruk</p>
                                <div class="row">
                                    <div class="col-6">
                                        <h6>
                                            <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            SLOT 1
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: 100px;">Source</span>: AJF44A 
                                            <br> 
                                            <span style="display:inline-block; width: 100px;">Destination</span>: AJF44A
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>
                                            <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            SLOT 2
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: 100px;">Source</span>: 
                                            <br> 
                                            <span style="display:inline-block; width: 100px;">Destination</span>:
                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="card-body">
                                        <img src="../../prismax/vuexy/assets/images/XIRM8688.png" height="140" alt="view sales">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-3 order-xl-0">
                        <div class="card drag-item cursor-move">
                            <div class="d-flex align-items-end row">
                                <div class="col-7">
                                    <div class="card-body text-nowrap">
                                        <h5 class="card-title mb-0">MASTER 3</h5>
                                        <p class="mb-2">Repeater</p>
                                        <h4 class="text-primary mb-1">1h 7m</h4>
                                        <a href="javascript:;" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                                <div class="col-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="../../prismax/vuexy/assets/images/XIRM8688.png" height="140" alt="view sales">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-3 order-xl-0">
                        <div class="card drag-item cursor-move">
                            <div class="d-flex align-items-end row">
                                <div class="col-7">
                                    <div class="card-body text-nowrap">
                                        <h5 class="card-title mb-0">MASTER 4</h5>
                                        <p class="mb-2">Repeater</p>
                                        <h4 class="text-primary mb-1">1h 7m</h4>
                                        <a href="javascript:;" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                                <div class="col-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="../../prismax/vuexy/assets/images/XIRM8688.png" height="140" alt="view sales">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- View sales -->
                </div>                
                <!-- /Cards Draggable ends -->
                <!-- list and filter start -->
                {{-- <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Search</h4>
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
                                    <th>License</th>
                                    <th>Valid</th>
                                    <th>Status</th>
                                    <th>Serial Number</th>
                                    <th>Expired</th>
                                    <th>Activation</th>
                                    <th>Purchase</th>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add License</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="user-company_id">Company Name</label>
                                        <select id="user-company_id" class="select2 form-select">
                                            @foreach ($companies as $company)
                                            <option value="{{$company['id']}}">{{$company['name_company']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="user-period">Period</label>
                                        <select id="user-period" class="select2 form-select">
                                            <option value="30">30 Day</option>
                                            <option value="90">90 Day</option>
                                            <option value="365">365 Day</option>
                                        </select>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Quantity</label>
                                        <input type="number" class="form-control dt-full-name" id="basic-icon-default-quantity" placeholder="100" name="user-fullname" />
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
                                var companyId = $('#user-company_id').val();
                                var period = $('#user-period').val();
                                var quantity = $('#basic-icon-default-quantity').val();
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
                                            url: '/license/generate', // Ganti dengan URL rute Anda
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            data: {
                                                // _token: csrfToken,
                                                company_id: companyId,
                                                validity_period: period,
                                                quantity: quantity
                                            },
                                            success: function(response) {
                                                // Membersihkan formulir setelah berhasil menambahkan data
                                                $('.add-new-user')[0].reset();
                    
                                                // Tampilkan pesan sukses menggunakan SweetAlert2
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'License has been added successfully.',
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
                                                    text: 'Failed to add license. Please try again later.',
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
                </div> --}}
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
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
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
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('prismax/vuexy/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('prismax/vuexy/app-assets/data/license/app-license-list.js')}}"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/libs/sortablejs/sortable.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/js/extended-ui-drag-and-drop.js"></script>
    <!-- END: Page JS-->
@endsection