@extends('layouts.simple.master')
@section('title', 'Data Petugas')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Update Akun</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data</li>
    <li class="breadcrumb-item active">Update Akun</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <p>Anda bisa mengubah password dengan mengisi kolom dibawah</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_akun.simpan_akun') }}">
                            {{ csrf_field() }}
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label f-w-600" for="id_rm">Email</label>
                                <div class="col-sm-9">
                                    <input class="email form-control" type="text" required=""
                                        value="{{ $user->email }}" name="email" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label f-w-600" for="password">Password</label>
                                <div class="col-sm-9">
                                    <input class="password form-control" type="password" required="" name="password"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                            <button class="btn btn-primary" data-type="btn-tambahdata" type="submit"
                                data-bs-original-title="" title="">Ubah Akun</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
