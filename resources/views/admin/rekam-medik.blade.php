@extends('layouts.simple.master')
@section('title', 'Data Rekam Medik')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data Rekam Medik</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Data Rekam Medik</li>
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
                                        <h4>Tambah Data</h4>
                                    </div>
                                    <form method="POST" action="{{ route('rmd.store') }}">
                                        {{ csrf_field() }}
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="id_rm">ID RM</label>
                                            <div class="col-sm-9">
                                                <input class="id_rm form-control" type="text" required=""
                                                    name="id_rm" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="nik">NIK</label>
                                            <div class="col-sm-9">
                                                <input class="nik form-control" type="text" required="" name="nik"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="nama_pasien">Nama
                                                Pasien</label>
                                            <div class="col-sm-9">
                                                <input class="nama_pasien form-control" type="text" required=""
                                                    name="nama_pasien" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="jk">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk"
                                                        value="L" id="jk1">
                                                    <label class="form-check-label" for="jk1">
                                                        Laki - Laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk"
                                                        value="P" id="jk2" checked>
                                                    <label class="form-check-label" for="jk2">
                                                        Perempuan
                                                    </label>
                                                </div>
                                                {{-- <select class="jk form-control" name="jk">
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="no_bpjs">No. BPJS</label>
                                            <div class="col-sm-9">
                                                <input class="no_bpjs form-control" type="text" name="no_bpjs"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="alamat">Alamat</label>
                                            <div class="col-sm-9">
                                                <input class="alamat form-control" type="text" required=""
                                                    name="alamat" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="no_hp">No. HP</label>
                                            <div class="col-sm-9">
                                                <input class="no_hp form-control" type="text" required=""
                                                    name="no_hp" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="tanggal_lahir">Tanggal
                                                Lahir</label>
                                            <div class="col-sm-9">
                                                {{-- <input class="datepicker-here form-control digits" name="date" type="text" id="inputRange" data-range="true" data-multiple-dates-separator=" - " data-language="en" autocomplete="off"> --}}
                                                <input class="datepicker-here form-control digits"
                                                    data-date-format="yyyy-mm-dd" data-position="top right"
                                                    type="text" data-language="en" required=""
                                                    name="tanggal_lahir" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="umur">Umur</label>
                                            <div class="col-sm-9">
                                                <input class="umur form-control" type="number" required=""
                                                    name="umur" data-bs-original-title="" title="">
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
                            <table class="display" id="data-rmd">
                                <thead>
                                    <tr>
                                        <th>NO RM</th>
                                        <th>NIK</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Umur</th>
                                        <th>Poli Tujuan</th>
                                        <th>Tanggal Berobat</th>
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

        function loadTable() {
            $('#data-rmd').DataTable({
                "ordering": false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('rmd.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        // visible: false
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        // visible: false
                    },
                    {
                        data: 'nama_pasien',
                        name: 'nama_pasien'
                    },
                    {
                        data: 'jk',
                        name: 'jk'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'umur',
                        name: 'umur'
                    },
                    {
                        data: 'poli.keterangan',
                        name: 'poli.keterangan'
                    },
                    {
                        data: 'tanggal_berobat',
                        name: 'tanggal_berobat'
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
