<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusPeminjamanRequest;
use App\Http\Requests\UpdateStatusPeminjamanRequest;
use App\Models\StatusPeminjaman;

class StatusPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusPeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusPeminjamanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusPeminjaman  $statusPeminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(StatusPeminjaman $statusPeminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusPeminjaman  $statusPeminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusPeminjaman $statusPeminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusPeminjamanRequest  $request
     * @param  \App\Models\StatusPeminjaman  $statusPeminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusPeminjamanRequest $request, StatusPeminjaman $statusPeminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusPeminjaman  $statusPeminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusPeminjaman $statusPeminjaman)
    {
        //
    }
}
