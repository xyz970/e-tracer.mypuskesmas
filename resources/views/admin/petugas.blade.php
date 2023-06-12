@extends('layouts.simple.master')
@section('title', 'Data Petugas')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Data Petugas</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Data Petugas</li>
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
									<h4>Tambah Data</h4>
								</div>
								<form method="POST" action="{{route('petugas.store')}}">
									{{ csrf_field() }}
									{{-- <div class="mb-3 row">
										<label class="col-sm-3 col-form-label f-w-600" for="id">ID Dokter</label>
										<div class="col-sm-9">
											<input class="id form-control" type="text" required=""
												name="id" data-bs-original-title="" title="">
										</div>
									</div> --}}
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label f-w-600" for="nama">Nama</label>
										<div class="col-sm-9">
											<input class="nama form-control" type="text" required="" name="nama"
												data-bs-original-title="" title="">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label f-w-600" for="email">Email</label>
										<div class="col-sm-9">
											<input class="email form-control" type="text" required="" name="email"
												data-bs-original-title="" title="">
										</div>
									</div>
									{{-- <div class="mb-3 row">
										<label class="col-sm-3 col-form-label f-w-600" for="password">Password</label>
										<div class="col-sm-9">
											<input class="password form-control" type="text" required="" name="password"
												data-bs-original-title="" title="">
										</div>
									</div> --}}
									
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label f-w-600" for="role_id">Role</label>
										<div class="col-sm-9">
											<select class="role_id form-control" name="role_id">
												@foreach ($role as $item)
												<option value="{{$item->id}}">{{$item->keterangan}}</option>
												@endforeach
											  </select>
										</div>
									</div>
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
					<div class="pb-6">
						<button class="btn" style="background-color: #FF3333; color:white;" type="button"
							data-bs-toggle="modal" data-bs-target=".tambahData">Tambah Data</button>
					</div>
					<div class="table-responsive">
						<table class="display" id="data-dokter">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nama Petugas</th>
									<th>Email</th>
									<th>Role</th>
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
<script src="{{asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/datatables/datatable.custom.js')}}"></script>
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
                ajax: "{{ route('petugas.index') }}",
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
                        data: 'email',
                        name: 'email',
                        // visible: false
                    }, 
                    {
                        data: 'role.keterangan',
                        name: 'role.keterangan',
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
