<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePoliRequest;
use App\Http\Requests\UpdatePoliRequest;
use App\Models\Poli;

class PoliController extends Controller
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
     * @param  \App\Http\Requests\StorePoliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoliRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(Poli $poli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePoliRequest  $request
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePoliRequest $request, Poli $poli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poli $poli)
    {
        //
    }
}
