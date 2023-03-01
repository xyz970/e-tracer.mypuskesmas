@extends('layouts.simple.master')
@section('title', 'Data Rekam Medik')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
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
                        <h5>BLM KEPIKIRAN DESKRIPSI</h5>
                        {{-- <span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span><span>One of the best ways of dealing with this is through the use of delegated events with jQuery's <code>on</code> method, as shown in this example. This
					example also uses the DataTables<code class="api" title="DataTables API method">row().data()API</code>               method to retrieve information about the selected row - the row's data so we can show it in the <code>alert</code> message in this case.</span> --}}
                    </div>
                    <div class="modal fade tambahData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center" style="padding-bottom: 2rem">
                                        <h4>Tambah Menu</h4>
                                    </div>
                                    <form method="POST" action="http://brothers-88.id/administrasi/data/menu/insert">
                                        {{ csrf_field() }}
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="meja">Nama
                                                Menu</label>
                                            <div class="col-sm-9">
                                                <input class="meja form-control" type="text" data-type="meja"
                                                    id="meja" required="" name="name" data-bs-original-title=""
                                                    title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="meja">Harga</label>
                                            <div class="col-sm-9">
                                                <input class="meja form-control" type="text" data-type="price"
                                                    id="price" required="" name="price" data-bs-original-title=""
                                                    title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="no_hp">Via<span
                                                    style="color: #a90011">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="costumer form-control" name="is_online" id="is_online">
                                                    <option value="false"> </option>
                                                    <option value="gojek">gojek</option>
                                                    <option value="shopee">shopee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="mejabaru">Kategori</label>
                                            <div class="col-sm-9">
                                                <select class="category form-control select2-hidden-accessible"
                                                    readonly="" data-input="category" type="text" data-type="category"
                                                    id="category" required="" name="categories_id" tabindex="-1"
                                                    aria-hidden="true"></select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" style="width: auto;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0"
                                                            aria-labelledby="select2-category-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-category-container"></span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pb-6">
                            <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal"
                                data-bs-target=".tambahData">Tambah Data</button>
                        </div>
                        <div class="table-responsive">
                            <table class="display" id="data-rmd">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No.BPJS</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Umur</th>
                                        <th>Poli Tujuan</th>
                                        <th>Tanggal Berobat</th>
                                        <th>Status</th>
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
                        data: 'no_bpjs',
                        name: 'no_bpjs'
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
                        data: 'tipe_perawatan.keterangan',
                        name: 'tipe_perawatan.keterangan'
                    },
                    {
                        data: 'tanggal_berobat',
                        name: 'tanggal_berobat'
                    },
                    {
                        data: 'poli.keterangan',
                        name: 'poli.keterangan'
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
