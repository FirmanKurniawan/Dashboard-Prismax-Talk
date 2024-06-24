@extends('layouts.app')
@section('title', 'Map - Prismax')
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
                <div class="content-body">
                    <section class="maps-leaflet">
                        <div class="row">
                            <!-- Basic Starts -->
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4 class="card-title">Map Tracking</h4>
                                        <div class="col-6">
                                        <form id="gpsForm">
                                        @csrf
                                        <select name="device" class="form-control">
                                            <option value="1">Device 1</option>
                                            <option value="2">Device 2</option>
                                            <option value="3">Device 3</option>
                                        </select>
                                        </div>
                                        <button id="getGPSButton" class="btn btn-primary toast-stacked-toggler">Get GPS</button>
                                        </form>

                                        <!-- Toast -->
                                        <div class="toast-container position-fixed top-0 end-0 p-2" style="z-index: 15">
                                        <div class="toast toast-stacked hide" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
                                            <div class="toast-header">
                                                <img src="https://i.ibb.co.com/GpV59nD/Logo-Prismax-Black-300x87.png" class="me-1" alt="Toast Image" height="40" width="45" />
                                                <strong class="me-auto"></strong>
                                                {{-- <small class="text-muted">2 seconds ago</small> --}}
                                                <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">GPS data successfully obtained</div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="leaflet-map" id="basic-map2"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Ends -->

                            <script>
                                $(document).ready(function() {
                                    $('#getGPSButton').click(function(e) {
                                        e.preventDefault();
                            
                                        // Ubah tombol menjadi spinner loading
                                        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="ms-25 align-middle">Loading...</span>').prop('disabled', true);
                            
                                        $.ajax({
                                            url: '/getGPS',
                                            type: 'POST',
                                            data: $('#gpsForm').serialize(),
                                            success: function(response) {
                                                // Ubah tombol kembali ke biasa
                                                $('#getGPSButton').html('Get GPS').prop('disabled', false);
                            
                                                // Tampilkan toast
                                                $('#myToast').toast('show');
                            
                                                // Lakukan sesuatu dengan respons dari server
                                                // console.log(response);
                                            },
                                            error: function() {
                                                // Ubah tombol kembali ke biasa jika terjadi error
                                                $('#getGPSButton').html('Get GPS').prop('disabled', false);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </section>
                </div>
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
    <link rel="stylesheet" href="{{asset('prismax/vuexy/app-assets/vendors/css/forms/select/select2.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/vendors/css/maps/leaflet.min.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('prismax/vuexy/app-assets/css/plugins/maps/map-leaflet.css')}}">
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

    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/maps/leaflet.min.js')}}"></script>
    <!-- Vendors JS -->
    <script src="{{asset('prismax/vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('prismax/vuexy/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('prismax/vuexy/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('prismax/vuexy/app-assets/js/scripts/components/components-bs-toast.js')}}"></script> --}}
    <script src="{{asset('prismax/vuexy/app-assets/data/company/app-company-list.js')}}"></script>
    {{-- <script src="{{asset('prismax/vuexy/assets/js/extended-ui-sweetalert2.js')}}"></script> --}}

    <script src="{{asset('prismax/vuexy/app-assets/js/scripts/maps/map-leaflet.js')}}"></script>
    <!-- END: Page JS-->
@endsection