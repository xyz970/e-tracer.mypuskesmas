@extends('layouts.simple.master')
@section('title', 'Data Peminjaman')

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection --}}

{{-- @section('style')
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection --}}

@section('breadcrumb-title')
    <h3>Data Peminjaman</h3>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/select2.css') }}">
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
                        <h5>BLM KEPIKIRAN DESKRIPSI</h5>
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
                                    <form method="POST" action="{{ route('peminjaman.store') }}">
                                        {{ csrf_field() }}
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="id">ID
                                                Peminjaman</label>
                                            <div class="col-sm-9">
                                                <input class="id form-control" type="text" required="" name="id"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
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
                                        {{-- <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="nama_pasien">Nama
                                                Pasien</label>
                                            <div class="col-sm-9">
                                                <input class="nama_pasien form-control" type="text" required=""
                                                    name="nama_pasien" data-bs-original-title="" title="">
                                            </div>
                                        </div> --}}
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
                                        <th>ID RM</th>
                                        <th>Jenis Kelamin</th>
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

    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    {{-- <script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script> --}}
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    {{-- <script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script> --}}
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
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
                        data: 'id_rm',
                        name: 'id_rm',
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
                    },{
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
@endsection
