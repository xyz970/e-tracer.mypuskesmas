<?php

namespace App\Http\Controllers;

use App\Helper\ExportWord;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Peminjaman;
use App\Models\Poli;
use App\Models\RekamMedik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $peminjaman = Peminjaman::with(['rekam_medik','status_peminjaman','rekam_medik.poli'])->get();
            return DataTables::of($peminjaman)
            ->addColumn('detail',function($item){
                return '<button onclick="update('.$item->id.')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons fa fa-info"></span></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['detail'])
            ->make(true);
        }
        $poli = Poli::all();
        return view('admin.peminjaman',compact('poli'));
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
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamanRequest $request)
    {
        $input = $request->only(['id','id_rm','keterangan']);
        $input = $input + array('waktu_peminjaman'=>Carbon::now());
        $peminjaman = Peminjaman::create($input);
        $rmd = RekamMedik::with(['poli'])->find($input['id_rm']);
        // dd();
        $file = public_path('template/Slip_Permintaan.rtf');
    
        $array = array(
            '[NO.RM]' => $input['id'],
            '[NAMA_PASIEN]' => $rmd->nama_pasien,
            '[POLI]' => $rmd->poli->keterangan,
            '[TANGGAL_PINJAM]' => Carbon::parse($peminjaman->waktu_peminjaman)->format('d M Y'),
        );
    
        $nama_file = 'peminjaman.doc';
        $exp = new ExportWord;
        return $exp->export($file, $array, $nama_file);
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
