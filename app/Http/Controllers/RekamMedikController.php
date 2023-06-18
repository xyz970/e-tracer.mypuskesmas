<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRekamMedikRequest;
use App\Http\Requests\UpdateRekamMedikRequest;
use App\Models\Poli;
use App\Models\RekamMedik;
use App\Models\TipePerawatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RekamMedikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $poli = Poli::all();
        $perawatan = TipePerawatan::all();
        if ($request->ajax()) {
            $rmd = RekamMedik::with(['tipe_perawatan', 'poli'])->get();
            return DataTables::of($rmd)->addIndexColumn()
                // ->addColumn('valid', function ($item) {
                //     if ($item->is_valid == 'true')
                //         $keterangan = '<td><span class="badge rounded-pill badge-success">Valid</span></td>';
                //     else
                //         $keterangan = '<td>
                //     <span class="badge rounded-pill badge-danger">Belum di validasi</span>
                //     </td>';
                //     return $keterangan;
                // })
                // ->addColumn('table', function ($item) {
                //     if ($item->table_id == 'gojek') {
                //         $table = '<span class="badge rounded-pill badge-success">GoFood</span>';
                //     } elseif ($item->table_id == 'shopee') {
                //         $table = '<span class="badge rounded-pill badge-danger">ShopeeFood</span>';
                //     } else {
                //         $table = '<span class="badge rounded-pill badge-primary">Cafe</span>';
                //     }
                //     return $table;
                // })
                ->addColumn('action', function ($item) {
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('admin.rekam-medik',compact('poli','perawatan'));
        }
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
     * @param  \App\Http\Requests\StoreRekamMedikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekamMedikRequest $request)
    {
        $input = $request->only([
            'id',
            'nik',
            'nama_pasien',
            'jk',
            'no_bpjs',
            'alamat',
            'no_hp',
            'tanggal_lahir',
            'umur',
            'poli_id',
            'tipe_perawatan_id'
        ]);
        RekamMedik::create($input);
        return redirect()->back()->with('tambahData','success');
        // dd($input);
        // if (!$request->validate()) {
        //     dd($request->v);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedik  $rekamMedik
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedik $rekamMedik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedik  $rekamMedik
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedik $rekamMedik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekamMedikRequest  $request
     * @param  \App\Models\RekamMedik  $rekamMedik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekamMedikRequest $request, RekamMedik $rekamMedik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedik  $rekamMedik
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedik $rekamMedik)
    {
        //
    }

    public function getData()
    {
        $rmd = RekamMedik::with(['tipe_perawatan', 'poli'])->get();
        return response()->json($rmd);
    }
}
