@extends('layouts.app')
@section('title', 'Master - Prismax')
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
                    @foreach ($masters as $master)
                    <div class="col-lg-6 order-3 order-xl-0">
                        <div class="card drag-item cursor-move">
                            <div class="text-center" style="padding-top: 1px; padding-bottom: 0.5px;">
                                @if ($master->package_id == 'MMDVM_MMDVM_HS_Hat')
                                    <img src="../../prismax/vuexy/assets/images/mmdvm-simplex.png" height="100" width="50" alt="view sales">
                                @elseif ($master->package_id == 'MMDVM_MMDVM_HS_Dual_Hat')
                                    <img src="../../prismax/vuexy/assets/images/mmdvm-duplex.png" height="100" width="50" alt="view sales">
                                @else
                                    <img src="../../prismax/vuexy/assets/images/prismax.png" height="100" width="50" alt="view sales">
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{$master->name}}</h5>
                                <h5>
                                    @if ($master->callsign == null) XXX @else {{$master->callsign}} @endif 
                                    @if ($master->dmr_id == null) (DMR ID: 00000) @else (DMR ID: {{$master->dmr_id}}) @endif 
                                </h5>
                                <p class="mb-2">
                                    @if ($master->connected == null) 0h 0m @else {{$master->connected}} @endif
                                    - 
                                    @if ($master->location == null) no location @else {{$master->location}} @endif
                                </p>
                                <div class="row">
                                    <div class="col-6">
                                        <h6>
                                            @if(!empty($master->live_data) && isset($master->live_data[1]))
                                                @if($master->live_data[1]['status'] == "START" && $master->live_data[1]['slot'] == 1)
                                                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                @endif
                                            @endif
                                            SLOT 1
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: 100px;">Source</span>: <span id="source-{{$master->name}}">.....</span>
                                            <br> 
                                            <span style="display:inline-block; width: 100px;">Destination</span>: <span id="destination-{{$master->name}}">.....</span>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>
                                            @if(!empty($master->live_data) && isset($master->live_data[2]))
                                                @if($master->live_data[2]['status'] == "START" && $master->live_data[2]['slot'] == 2)
                                                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                @endif
                                            @endif
                                            SLOT 2
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: 100px;">Source</span>: <span id="source-{{$master->name}}">.....</span>
                                            <br> 
                                            <span style="display:inline-block; width: 100px;">Destination</span>: <span id="destination-{{$master->name}}">.....</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- View sales -->
                </div>
                
                <script>
                    // Function to fetch live data from API and update source and destination every second
                    function updateLiveData() {
                        setInterval(function() {
                            fetch('http://localhost:8000/master/live_data')
                            .then(response => response.json())
                            .then(data => {
                                // Loop through the received data and update source and destination
                                Object.keys(data).forEach(masterName => {
                                    const master = data[masterName];
                                    if (master[1] && master[1].status == "START") {
                                        document.getElementById('source-' + masterName).innerText = master[1].callsign;
                                    }
                                    if (master[1] && master[1].status == "START") {
                                        document.getElementById('destination-' + masterName).innerText = master[1].callsign;
                                    }
                                });
                            })
                            .catch(error => console.error('Error fetching live data:', error));
                        }, 3000); // Update every 1 second
                    }
                
                    // Call the function to start updating live data
                    updateLiveData();
                </script>                
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