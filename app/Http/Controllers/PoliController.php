<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePoliRequest;
use App\Http\Requests\UpdatePoliRequest;
use App\Models\Poli;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $poli = Poli::all();
            return DataTables::of($poli)
            ->addColumn('detail',function($item){
                return '<button onclick="update('.$item->id.')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons fa fa-info"></span></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['detail'])
            ->make(true);
        }
        return view('admin.poli');
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
        Poli::create($request->validated());
        return redirect()->back()->with('tambahData','true');
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
