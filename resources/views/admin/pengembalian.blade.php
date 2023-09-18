@extends('layouts.simple.master')
@section('title', 'Data Pengembalian')

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
@endsection --}}

{{-- @section('style')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
@endsection --}}

@section('breadcrumb-title')
    <h3>Data Pengembalian</h3>
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
    <li class="breadcrumb-item active">Data Pengembalian</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="display" id="data-pengembalian">
                                <thead>
                                    <tr>
                                        <th>ID RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Poli</th>
                                        <th>Keterangan</th>
                                        <th>Waktu Peminjaman</th>
                                        <th>Waktu Pengembalian</th>
                                        <th>Aksi</th>

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
             var sig1 = $('#sig1').signature({
                syncField: '#signature641',
                syncFormat: 'PNG'
            });
            $('#clear1').click(function(e) {
                e.preventDefault();
                sig1.signature('clear');
                $("#signature641").val('');
            });

        })
        $('.id_rm').select2({

            dropdownParent: $('.tambahData'),
            ajax: {
                url: "{{ route('rmd.getData') }}",
                dataType: 'json',
                delay: 250,
                type: 'GET',
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.id + " - " + item.nama_pasien,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });

        function loadTable() {
            $('#data-pengembalian').DataTable({
                "ordering": false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengembalian.index') }}",
                columns: [{
                        data: 'rekam_medik.id',
                        name: 'rekam_medik.id',
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
                    {
                        data: 'waktu_peminjaman',
                        name: 'waktu_peminjaman',
                        // visible: false
                    },
                    {
                        data: 'waktu_pengembalian',
                        name: 'waktu_pengembalian',
                        // visible: false
                    },

                    {
                         data: 'verifikasi',
                         name: 'verifikasi',
                         visible: {{ Auth::user()->role_id == 3 ? 'true' : 'false' }}
                     },
                ],
            });
        }
    </script>
@endsection
