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
                    <div class="card-header">
                        <h5></h5>
                        {{-- <span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span><span>One of the best ways of dealing with this is through the use of delegated events with jQuery's <code>on</code> method, as shown in this example. This
					example also uses the DataTables<code class="api" title="DataTables API method">row().data()API</code>               method to retrieve information about the selected row - the row's data so we can show it in the <code>alert</code> message in this case.</span> --}}
                    </div>
                    <div class="modal fade tambahData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center" style="padding-bottom: 2rem">
                                        <h4>Tambah Data Peminjaman</h4>
                                    </div>
                                    <form method="POST" action="{{ route('peminjaman.store') }}" target="_blank">
                                        {{ csrf_field() }}
                                       
                                        {{-- <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="nama">Nama</label>
                                            <div class="col-sm-9">
                                                <input class="nama form-control" type="text" required="" name="nama"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div> --}}

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="id_rm">Rekam
                                                Medik</label>
                                            <div class="col-sm-9">
                                                <select class="id_rm form-control" name="id_rm" id="id_rm">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="jk">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="keterangan" rows="3"></textarea>
                                            </div>
                                        </div>
                                      


                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                        data-bs-original-title="" title="">Tutup</button>
                                    <button class="btn btn-primary" data-type="btn-tambahdata" type="submit"
                                        data-bs-original-title="" title="">Tambah Data</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade exportData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center" style="padding-bottom: 2rem">
                                        <h4>Export</h4>
                                    </div>
                                    <form method="POST" action="{{ route('peminjaman.export') }}" target="_blank">
                                        {{ csrf_field() }}
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="">Silahkan membuat
                                                tandatangan sesuai
                                                yang diinginkan :</label>
                                            <div class="col-sm-9">
                                                <div id="sig1"></div>
                                                <button id="clear1" class="btn btn-danger btn-sm">Hapus
                                                    Tandatangan</button>
                                                <textarea id="signature641" name="signed" style="display:none"></textarea>
                                            </div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="jk">Nama
                                                Terang</label>
                                            <div class="col-sm-9">
                                                <input class="id form-control" type="text" required="" name="nama_terang"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                        data-bs-original-title="" title="">Tutup</button>
                                    <button class="btn btn-primary" data-type="btn-tambahdata" type="submit"
                                        data-bs-original-title="" title="">Tambah Data</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pb-6">
                       
                                
                         <button class="btn" style="background-color: #FF3333; color:white;" type="button"
                                data-bs-toggle="modal" data-bs-target=".tambahData">Tambah Data</button>
                           
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="data-peminjaman">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Verifikasi Peminjaman</th>
                                        <th>Status Keterlambatan</th>
                                        <th>Status</th>
                                        <th>Poli</th>
                                        <th>Keterangan</th>
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
            $('#data-peminjaman').DataTable({
                "ordering": false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('peminjaman.index') }}",
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
                        data: 'verifikasi_peminjaman',
                        name: 'verifikasi_peminjaman',
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
                    {
                        data: 'verifikasi_peminjaman_btn',
                        name: 'verifikasi_peminjaman_btn',
                        visible: {{ Auth::user()->role_id == '2' ? 'true' : 'false' }},
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
