@extends('layouts.simple.master')
@section('title', 'Data Poli')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data Dokter</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Data Dokter</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

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
                                    <form method="POST" action="{{route('dokter.store')}}">
                                        {{ csrf_field() }}
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="id">ID Dokter</label>
                                            <div class="col-sm-9">
                                                <input class="id form-control" type="text" required=""
                                                    name="id" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="nama">Nama</label>
                                            <div class="col-sm-9">
                                                <input class="nama form-control" type="text" required="" name="nama"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="id_poli">Poli</label>
                                            <div class="col-sm-9">
												<select class="id_poli form-control" name="id_poli">
                                                    @foreach ($poli as $item)
													<option value="{{$item->id}}">{{$item->keterangan}}</option>
                                                    @endforeach
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
                                            <label class="col-sm-3 col-form-label f-w-600" for="jk">Jenis Kelamin</label>
                                            <div class="col-sm-9">
												<select class="jk form-control" name="jk">
													<option value="L">Laki-Laki</option>
													<option value="P">Perempuan</option>
												  </select>
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
                        @if (Auth::user()->role_id == 3)
                            <div class="pb-6">
                                <button class="btn" style="background-color: #FF3333; color:white;" type="button"
                                        data-bs-toggle="modal" data-bs-target=".tambahData">Tambah Data</button>
                            </div>
                        @endif

{{--                        <div class="pb-6">--}}
{{--                            <button class="btn" style="background-color: #FF3333; color:white;" type="button"--}}
{{--                                data-bs-toggle="modal" data-bs-target=".tambahData">Tambah Data</button>--}}
{{--                        </div>--}}
                        <div class="table-responsive">
                            <table class="display" id="data-dokter">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Dokter</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Poli</th>
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
<script src="{{asset('js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('js/datepicker/date-picker/datepicker.en.js')}}"></script>
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
            $('#data-dokter').DataTable({
                "ordering": false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('dokter.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        // visible: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        // visible: false
                    },
                    {
                        data: 'jk',
                        name: 'jk',
                        // visible: false
                    },
                    {
                        data: 'poli.keterangan',
                        name: 'poli.keterangan',
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
