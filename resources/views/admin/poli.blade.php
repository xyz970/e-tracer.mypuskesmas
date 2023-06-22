@extends('layouts.simple.master')
@section('title', 'Data Poli')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data Poli</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Data Poli</li>
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
                                    <form method="POST" action="{{route('poli.store')}}">
                                        {{ csrf_field() }}
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label f-w-600" for="keterangan">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input class="keterangan form-control" type="text" required=""
                                                    name="keterangan" data-bs-original-title="" title="">
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
                    @if(Auth::user()->role_id == 1)
                        <div class="pb-6">
                            <button class="btn" style="background-color: #FF3333; color:white;" type="button"
                                data-bs-toggle="modal" data-bs-target=".tambahData">Tambah Data</button>
                        </div>
                    @endif
                        <div class="table-responsive">
                            <table class="display" id="data-poli">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Poli</th>
                                        <th>Detail</th>
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
            $('#data-poli').DataTable({
                "ordering": false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('poli.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        // visible: false
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        // visible: false
                    }, 
                    {
                        data: 'detail',
                        name: 'detail',
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
