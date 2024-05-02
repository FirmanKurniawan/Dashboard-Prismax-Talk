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
                    {{-- <div class="col-lg-12 col-md-12 mt-2">
                        <!-- Bootstrap Table with Header - Dark -->
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-sm" id="lastheard-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Time</th>
                                            <th>Mode</th>
                                            <th>Callsign</th>
                                            <th>Target</th>
                                            <th>Src</th>
                                            <th>Dur</th>
                                            <th>Loss</th>
                                            <th>BER</th>
                                            <th>RSSI</th>
                                            <th>All time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <!-- Data akan diisi melalui AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Bootstrap Table with Header Dark -->
                    </div>
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        // Fungsi untuk memperbarui data tabel
                        function updateTable() {
                            $.ajax({
                                url: 'http://103.18.133.192:3000/master/lastheard',
                                method: 'GET',
                                success: function(response) {
                                    var tableBody = $('#lastheard-table tbody');
                                    tableBody.empty(); // Bersihkan isi tabel sebelum mengisi data baru
                                    $.each(response.data, function(key, data) {
                                        var row = '<tr>' +
                                            '<td>' + data.time_utc + '</td>' +
                                            '<td>' + data.mode + '</td>' +
                                            '<td>' + data.callsign + '</td>' +
                                            '<td>' + data.target + '</td>' +
                                            '<td>' + data.src + '</td>' +
                                            '<td>' + data.duration + '</td>' +
                                            '<td>' + data.loss + '</td>' +
                                            '<td>' + data.bit_error_rate + '</td>' +
                                            '<td>' + data.rssi + '</td>' +
                                            '<td>' + data.total_duration + ' min' + '</td>' +
                                            '</tr>';
                                        tableBody.append(row); // Tambahkan baris ke tabel
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                }
                            });
                        }
                    
                        // Panggil fungsi updateTable() secara berkala setiap 5 detik
                        setInterval(updateTable, 500);
                    });
                    </script> --}}

                    <div class="col-lg-12 col-md-12 mt-2">
                        <!-- Checkbox untuk setiap kolom tabel -->
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" id="copyTable">
                                Copy
                            </button>
                            <button class="btn btn-secondary" type="button" onclick="generatePDF()">
                                Pdf
                            </button>
                        </div>
                        <div>
                            <label><input type="checkbox" id="chkTime" checked> Time</label>
                            <label><input type="checkbox" id="chkMode" checked> Mode</label>
                            <!-- Tambahkan checkbox untuk kolom lainnya -->
                        </div>
                        
                        <!-- Bootstrap Table with Header - Dark -->
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-sm" id="lastheard-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th id="thTime">Time</th>
                                            <th id="thMode">Mode</th>
                                            <!-- Tambahkan th untuk kolom lainnya -->
                                            <th>Name</th>
                                            <th>Callsign</th>
                                            <th>Target</th>
                                            <th>Src</th>
                                            <th>Dur</th>
                                            <th>Loss</th>
                                            <th>BER</th>
                                            <th>RSSI</th>
                                            <th>All time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <!-- Data akan diisi melalui AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Bootstrap Table with Header Dark -->
                    </div>
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
                    <script>
                        // Inisialisasi ClipboardJS
                        var clipboard = new ClipboardJS('#copyTable', {
                            text: function(trigger) {
                                // Salin data dari tabel
                                var tableData = [];
                                $('#lastheard-table tbody tr').each(function() {
                                    var rowData = [];
                                    $(this).find('td').each(function() {
                                        rowData.push($(this).text().trim());
                                    });
                                    tableData.push(rowData.join('\t')); // Data baris
                                });
                    
                                return tableData.join('\n'); // Gabungkan semua baris data
                            }
                        });

                        // Fungsi untuk membuat file PDF
                        function generatePDF() {
                            const { jsPDF } = window.jspdf;
                            const doc = new jsPDF();

                            // Tambahkan data tabel ke PDF
                            doc.text(10, 10, 'Data Tabel');
                            $('#lastheard-table tbody tr').each(function(rowIndex, row) {
                                var yPos = 20 + (rowIndex * 10);
                                $(row).find('td').each(function(colIndex, col) {
                                    doc.text(10 + (colIndex * 50), yPos, $(col).text().trim());
                                });
                            });

                            // Simpan PDF
                            doc.save('table_data.pdf');
                        }   
                    </script>
                    <script>
                        // Simpan status checkbox di luar fungsi updateTable()
                        var modeChecked = true; // Secara default, checkbox Mode dicentang
                        var timeChecked = true; // Secara default, checkbox Time dicentang
                    
                        // Fungsi untuk memperbarui data tabel
                        function updateTable() {
                            $.ajax({
                                url: 'http://103.18.133.192:3000/master/lastheard',
                                method: 'GET',
                                success: function(response) {
                                    var tableBody = $('#lastheard-table tbody');
                                    tableBody.empty(); // Bersihkan isi tabel sebelum mengisi data baru
                                    $.each(response.data, function(key, data) {
                                        var row = '<tr>' +
                                            '<td>' + (timeChecked ? data.time_utc : '') + '</td>' + // Tampilkan time hanya jika checkbox dicentang
                                            '<td>' + (modeChecked ? data.mode : '') + '</td>' + // Tampilkan mode hanya jika checkbox dicentang
                                            // Tambahkan td untuk kolom lainnya
                                            '<td>' + data.callsign_detail + '</td>' +
                                            '<td>' + data.callsign + '</td>' +
                                            '<td>' + data.target + '</td>' +
                                            '<td>' + data.src + '</td>' +
                                            '<td>' + data.duration + '</td>' +
                                            '<td>' + data.loss + '</td>' +
                                            '<td>' + data.bit_error_rate + '</td>' +
                                            '<td>' + data.rssi + '</td>' +
                                            '<td>' + data.total_duration + ' min' + '</td>' +
                                            '</tr>';
                    
                                        tableBody.append(row); // Tambahkan baris ke tabel
                                    });
                                    
                                    // Atur visibilitas kolom "Time" dan "Mode" berdasarkan status checkbox "Time" dan "Mode"
                                    var timeColumnIndex = $('#lastheard-table th:contains("Time")').index() + 1;
                                    var modeColumnIndex = $('#lastheard-table th:contains("Mode")').index() + 1;
                                    if (timeChecked) {
                                        $('#lastheard-table th:nth-child(' + timeColumnIndex + '), #lastheard-table td:nth-child(' + timeColumnIndex + ')').show();
                                    } else {
                                        $('#lastheard-table th:nth-child(' + timeColumnIndex + '), #lastheard-table td:nth-child(' + timeColumnIndex + ')').hide();
                                    }
                                    if (modeChecked) {
                                        $('#lastheard-table th:nth-child(' + modeColumnIndex + '), #lastheard-table td:nth-child(' + modeColumnIndex + ')').show();
                                    } else {
                                        $('#lastheard-table th:nth-child(' + modeColumnIndex + '), #lastheard-table td:nth-child(' + modeColumnIndex + ')').hide();
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                }
                            });
                        }
                    
                        // Panggil fungsi updateTable() secara berkala setiap 500 ms
                        setInterval(updateTable, 2000);
                    
                        // Tambahkan event listener untuk checkbox Mode
                        $('#chkMode').change(function() {
                            modeChecked = $(this).is(':checked'); // Perbarui status checkbox
                        });
                    
                        // Tambahkan event listener untuk checkbox Time
                        $('#chkTime').change(function() {
                            timeChecked = $(this).is(':checked'); // Perbarui status checkbox
                        });
                    </script>
                </div>

                {{-- FIX --}}

                <div class="col-lg-12 order-3 order-xl-0">
                    <div class="card">
                        <div class="card-body text-center" style="padding-bottom: 5px;"> <!-- Mengurangi padding-bottom -->
                            <!-- Data will be dynamically added here -->
                        </div>
                    </div>
                </div>
                
                <script>
                    // Function to fetch data from the API and update the HTML
                    function fetchDataAndUpdate() {
                        fetch('http://103.18.133.192:3000/master/live_data')
                            .then(response => response.json())
                            .then(data => {
                                // Clear previous HTML
                                const container = document.querySelector('.card-body');
                                container.innerHTML = '';

                                // Iterate over each master
                                data.forEach(master => {
                                    // Create HTML for master
                                    let masterHtml = `
                                        <hr style="border-top: 1px solid #000; width: 100%; margin-top: 0.5rem; margin-bottom: 0.5rem;">
                                        <h5 class="card-title mb-1">${master.name}</h5>
                                        <hr style="border-top: 1px solid #000; width: 100%; margin-top: 0.5rem; margin-bottom: 0.5rem;">
                                    `;

                                    // Check if master has peers
                                    if (master.peers.length > 0) {
                                        // Iterate over peers
                                        master.peers.forEach(peer => {
                                            // Check if connected and location are defined
                                            let connectedText = peer.connected ? peer.connected : "";
                                            let locationText = peer.location ? peer.location : "";

                                            // Determine background color
                                            let backgroundColorSlot1 = peer.slots[0].sub ? 'background-color: #e5f9e8;' : '';
                                            let backgroundColorSlot2 = peer.slots[1].sub ? 'background-color: #e5f9e8;' : '';

                                            // Determine display for spinner grow
                                            let displaySpinner1 = peer.slots[0].sub ? '' : 'display: none;';
                                            let displaySpinner2 = peer.slots[1].sub ? '' : 'display: none;';

                                            // Create HTML for each peer
                                            masterHtml += `
                                                <h5>${peer.callsign} (DMR ID: ${peer.dmr_id})</h5>
                                                <p>${connectedText} - ${locationText}</p>
                                                <div class="col-lg-12">
                                                    <div id="background-live-${master.name}-${peer.id}" class="card">
                                                        <div class="card-body text-center" style="padding: 0px;">
                                                            <img src="../../prismax/vuexy/assets/images/mmdvm-duplex.png" height="80" width="50">
                                                            <div class="row">
                                                                <!-- Slot 1 -->
                                                                <div class="col-6" style="${backgroundColorSlot1}">
                                                                    <h6>
                                                                        <div id="spinner-${master.name}-${peer.id}-1" class="spinner-grow spinner-grow-sm text-success" role="status" style="${displaySpinner1}"></div>  
                                                                        SLOT 1
                                                                    </h6>
                                                                    <span style="display:inline-block; width: auto">Source</span>:  ${peer.slots[0].sub}
                                                                    <br> 
                                                                    <span style="display:inline-block; width: auto">Destination</span>: ${peer.slots[0].dest}
                                                                </div>
                                                                <!-- Slot 2 -->
                                                                <div class="col-6" style="${backgroundColorSlot2}">
                                                                    <h6>
                                                                        <div id="spinner2-${master.name}-${peer.id}-2" class="spinner-grow spinner-grow-sm text-success" role="status" style="${displaySpinner2}">
                                                                            <span class="visually-hidden">Loading...</span>
                                                                        </div>
                                                                        SLOT 2
                                                                    </h6>
                                                                    <span style="display:inline-block; width: auto">Source</span>:  ${peer.slots[1].sub}
                                                                    <br> 
                                                                    <span style="display:inline-block; width: auto">Destination</span>: ${peer.slots[1].dest}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr style="border-top: 1px solid #000; width: 100%; margin-top: 0.5rem; margin-bottom: 0.5rem;">
                                                    </div>
                                                </div>
                                            `;
                                        });
                                    } else {
                                        // If there are no peers, use master's dmr_id
                                        masterHtml += `
                                        `;
                                    }

                                    // Add additional HTML for master
                                    masterHtml += `
                                        <!-- Peers -->
                                        <div class="row">
                                            <!-- Peers will be dynamically added here -->
                                        </div>
                                        <!-- End Peers -->
                                    `;

                                    // Append master HTML to the container
                                    container.innerHTML += masterHtml;
                                });
                            })
                            .catch(error => console.error('Error fetching data:', error));
                    }

                    // Call fetchDataAndUpdate initially
                    fetchDataAndUpdate();

                    // Call fetchDataAndUpdate every second
                    setInterval(fetchDataAndUpdate, 1000);
                </script>
                

                {{-- <!-- View sales -->
                <div class="col-lg-12 order-3 order-xl-0">
                    <div class="card">
                        <div class="card-body text-center" style="padding-bottom: 5px;"> <!-- Mengurangi padding-bottom -->
                            <h5 class="card-title mb-1">MASTER-1</h5>
                            <h5>
                                (DMR ID: 00000)
                                (DMR ID: 00000) 
                            </h5>
                            <p class="mb-2">
                                0h 0m
                                - 
                                no location
                            </p>
                            <!-- Peers -->
                            <div class="row">
                                @foreach ($masters as $index => $master)
                                    @foreach ($master->peers as $peer)
                                        <div class="col-lg-12">
                                            <div id="background-live-{{$master->name}}-{{$peer->id}}" class="card">
                                                <div class="card-body text-center" style="padding: 0px;">
                                                    <img src="../../prismax/vuexy/assets/images/mmdvm-duplex.png" height="80" width="50">
                                                    <div class="row">
                                                        <!-- Slot 1 -->
                                                        <div class="col-6">
                                                            <h6>
                                                                <div id="spinner-{{$master->name}}-{{$peer->id}}-1" class="spinner-grow spinner-grow-sm text-success" role="status" style="display: none;">
                                                                </div>  
                                                                SLOT 1
                                                            </h6>
                                                            <span style="display:inline-block; width: auto">Source</span>: 10001 (FIRMAN)
                                                            <br> 
                                                            <span style="display:inline-block; width: auto">Destination</span>: 10001
                                                        </div>
                                                        <!-- Slot 2 -->
                                                        <div class="col-6">
                                                            <h6>
                                                                <div id="spinner2-{{$master->name}}-{{$peer->id}}-2" class="spinner-grow spinner-grow-sm text-success" role="status" style="display: none;">
                                                                    <span class="visually-hidden">Loading...</span>
                                                                </div>
                                                                SLOT 2
                                                            </h6>
                                                            <span style="display:inline-block; width: auto">Source</span>: 10002 (JAJANG)
                                                            <br> 
                                                            <span style="display:inline-block; width: auto">Destination</span>: 10002
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="color: red">
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <!-- End Peers -->
                        </div>
                    </div>
                </div>
                <!-- View sales --> --}}
                {{-- END FIX --}}

                <!-- Cards Draggable -->
                {{-- <div class="row mb-4" id="sortable-cards">
                    <!-- View sales -->
                    @foreach ($masters as $master)
                    <div class="col-lg-6 order-3 order-xl-0">
                        <div class="card drag-item cursor-move">
                            <div class="text-center" style="padding-top: 1px; padding-bottom: 0.5px;">
                                @if ($master->package_id == 'MMDVM_MMDVM_HS_Hat')
                                    <img src="../../prismax/vuexy/assets/images/mmdvm-simplex.png" height="80" width="50" alt="view sales">
                                @elseif ($master->package_id == 'MMDVM_MMDVM_HS_Dual_Hat')
                                    <img src="../../prismax/vuexy/assets/images/mmdvm-duplex.png" height="80" width="50" alt="view sales">
                                @else
                                    <img src="../../prismax/vuexy/assets/images/signal.png" height="80" width="50" alt="view sales">
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{$master->name}}</h5>
                                <h5>
                                    @if ($master->callsign == null) XXX @else {{$master->callsign}} @endif 
                                    @if ($master->dmr_id == null) (DMR ID: 00000) @else 
                                    (DMR ID: {{$master->dmr_id}}) 
                                    @endif 
                                </h5>
                                <p class="mb-2">
                                    @if ($master->connected == null) 0h 0m @else {{$master->connected}} @endif
                                    - 
                                    @if ($master->location == null) no location @else {{$master->location}} @endif
                                </p>
                                <div class="row">
                                    <div id="background-live-{{$master->name}}" class="col-6">
                                        <h6 style="padding-top: 5%;">
                                            <div id="spinner-{{$master->name}}" class="spinner-grow spinner-grow-sm text-success" role="status" style="display: none;">
                                            </div>
                                            SLOT 1
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: auto">Source</span>: <span id="source-{{$master->name}}">.....</span>
                                            <br> 
                                            <span style="display:inline-block; width: auto">Destination</span>: <span id="destination-{{$master->name}}">.....</span>
                                        </p>
                                    </div>
                                    <div id="background-live2-{{$master->name}}" class="col-6">
                                        <h6  style="padding-top: 5%;">
                                            <div id="spinner2-{{$master->name}}" class="spinner-grow spinner-grow-sm text-success" role="status" style="display: none;">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            SLOT 2
                                        </h6>
                                        <p>
                                            <span style="display:inline-block; width: auto">Source</span>: <span id="source2-{{$master->name}}">.....</span>
                                            <br> 
                                            <span style="display:inline-block; width: auto">Destination</span>: <span id="destination2-{{$master->name}}">.....</span>
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
                            fetch('http://103.18.133.192:3000/master/live_data')
                            // fetch('http://127.0.0.1:8000/master/live_data')
                            .then(response => response.json())
                            .then(data => {
                                // Loop through the received data and update source and destination
                                Object.keys(data).forEach(masterName => {
                                    const master = data[masterName];

                                    const backgroundLiveElement = document.getElementById('background-live-' + masterName);
                                    const backgroundLiveElement2 = document.getElementById('background-live2-' + masterName);
                                    // Ensure the element is found before trying to access its style
                                    if (backgroundLiveElement) {
                                        // SLOT 1
                                        if (master[1] && master[1].status == "START") {
                                            backgroundLiveElement.style.backgroundColor = '#ff6600';
                                            backgroundLiveElement.style.color = 'white';
                                            document.getElementById('source-' + masterName).innerText = master[1].callsign + "\n" + master[1].callsign_detail.name + "\n" + master[1].callsign_detail.email;
                                            document.getElementById('spinner-' + masterName).style.display = "inline-block";
                                            // console.log(master[2].callsign)
                                        }else if(master[1] && master[1].status == "END"){
                                            backgroundLiveElement.style.backgroundColor = '#ffffff';
                                            backgroundLiveElement.style.color = '';
                                            document.getElementById('source-' + masterName).innerText = ".....";
                                            document.getElementById('spinner-' + masterName).style.display = "none";
                                        }

                                        if (master[1] && master[1].status == "START") {
                                            document.getElementById('destination-' + masterName).innerText = master[1].callsign;
                                        }
                                        else if(master[1] && master[1].status == "END"){
                                            document.getElementById('destination-' + masterName).innerText = ".....";
                                        }

                                        // SLOT 2
                                        if(master[2] && master[2].status == "START"){
                                            backgroundLiveElement2.style.backgroundColor = '#ff6600';
                                            backgroundLiveElement2.style.color = 'white';
                                            document.getElementById('source2-' + masterName).innerText = master[2].callsign + "\n" + master[2].callsign_detail.name + "\n" + master[2].callsign_detail.email;
                                            document.getElementById('spinner2-' + masterName).style.display = "inline-block";
                                        }else if(master[2] && master[2].status == "END"){
                                            backgroundLiveElement2.style.backgroundColor = '#ffffff';
                                            backgroundLiveElement2.style.color = '';
                                            document.getElementById('source2-' + masterName).innerText = ".....";
                                            document.getElementById('spinner2-' + masterName).style.display = "none";
                                        }

                                        if (master[2] && master[2].status == "START") {
                                            document.getElementById('destination2-' + masterName).innerText = master[2].callsign;
                                        }
                                        else if(master[2] && master[2].status == "END"){
                                            document.getElementById('destination2-' + masterName).innerText = ".....";
                                        }
                                    }
                                });
                            })
                            .catch(error => console.error('Error fetching live data:', error));
                        }, 500); // Update every 1 second
                    }
                
                    // Call the function to start updating live data
                    updateLiveData();
                </script>                 --}}
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