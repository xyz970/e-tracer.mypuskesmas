<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pengembalian = Peminjaman::with(['rekam_medik','status_peminjaman','rekam_medik.poli'])->where('status_id','=','1')->get();
            return DataTables::of($pengembalian)
            ->addColumn('detail',function($item){
                return '<button onclick="update('.$item->id.')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons fa fa-info"></span></button>';
            })
            ->addColumn('verifikasi',function($item){
                return '<a class="btn btn-primary">Verifikasi</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['verifikasi'])
            ->make(true);
        }
        // $poli = Poli::all();
        return view('admin.pengembalian');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
