@extends('layouts.simple.master')
@section('title', 'Data Peminjaman')

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
@endsection --}}

{{-- @section('style')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
@endsection --}}

@section('breadcrumb-title')
    <h3>Data Peminjaman</h3>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">


    <style>
        .kbw-signature {
            width: 58%;
            height: 400px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>
@endsection
@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Data Peminjaman</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        @if (Auth::user()->role_id != 2)
                            <div class="mb-3 row g-3">
                                <form action="{{ route('laporan.export') }}" method="POST">
                                    {{ csrf_field() }}
                                    <label class="col-sm-3 col-form-label">Export Data</label>
                                    <div class="col-xl-5 col-sm-9">
                                        <input class="datepicker-here form-control digits"
                                           name="date"
                                            type="text" id="inputRange" data-range="true"
                                            data-multiple-dates-separator=" - " data-language="en" autocomplete="off">

                                    </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <button class="btn" style="background-color: #FF3333; color:white;" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title
                                        data-bs-original-title="Export data peminjaman sesuai dengan tanggal">Export</button>

                                </div>
                                </form>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="display" id="data-peminjaman">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Keterlambatan</th>
                                        <th>Status</th>
                                        <th>Poli</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    {{-- <script src="{{asset('js/sweet-alert/sweetalert.min.js')}}"></script> --}}
    <script src="{{ asset('js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    {{-- <script src="{{asset('js/sweet-alert/sweetalert.min.js')}}"></script> --}}
    <script src="{{ asset('js/sweet-alert/sweetalert.min.js') }}"></script>

    @if (Session::has('tambahData'))
        <script>
            swal({
                title: "Berhasil",
                text: "Data berhasil ditambahkan",
                icon: "success",
            })
        </script>
    @endif
    <script>
        $(document).ready(function() {
            loadTable();
            var sig = $('#sig').signature({
                syncField: '#signature64',
                syncFormat: 'PNG'
            });
            $('#clear').click(function(e) {
                e.preventDefault();
                sig.signature('clear');
                $("#signature64").val('');
            });


        })

        function loadTable() {
            $('#data-peminjaman').DataTable({
                "ordering": false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('laporan.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        // visible: false
                    },
                    {
                        data: 'rekam_medik.nama_pasien',
                        name: 'rekam_medik.nama_pasien',
                        // visible: false
                    },
                    {
                        data: 'rekam_medik.jk',
                        name: 'rekam_medik.jk',
                        // visible: false
                    },
                    {
                        data: 'status_keterlambatan',
                        name: 'status_keterlambatan',
                        // visible: false
                    },
                    {
                        data: 'status_peminjaman.keterangan',
                        name: 'status_peminjaman.keterangan',
                        // visible: false
                    },
                    {
                        data: 'rekam_medik.poli.keterangan',
                        name: 'rekam_medik.poli.keterangan',
                        // visible: false
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        // visible: false
                    },

                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false
                    // },
                ],
            });
        }
    </script>
    <script></script>
@endsection
