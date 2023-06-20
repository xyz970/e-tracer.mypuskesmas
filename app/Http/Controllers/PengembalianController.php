<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Carbon\Carbon;
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
                    return '<a href="'.route('pengembalian.verifikasi_pengembalian',['id'=>$item->id]).'" class="btn btn-primary">Verifikasi</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['verifikasi','status_keterlambatan'])
            ->make(true);
        }
        // $poli = Poli::all();
        return view('admin.pengembalian');
    }

    public function verifikasi_pengembalian($id)
    {
        $peminjaman = Peminjaman::find($id);
        $created_at = Carbon::createFromTimeString($peminjaman->created_at)->addDay();
        $peminjaman->waktu_pengembalian = Carbon::now();
        /**
         * if else 
         * rawat jalan / inap
         */
        if ($peminjaman->rekam_medik->tipe_perawatan_id == 2) {
            if ($created_at <= Carbon::now()) {
                $peminjaman->terlambat = 'true';   
            }    
        } else {
            if ($created_at <= Carbon::now()->addDay()) {
                $peminjaman->terlambat = 'true';   
            }
        }
        
        
        $peminjaman->status_id = 2;
        // dd($created_at <= Carbon::now());
        // if (Carbon::createFromTimeString($peminjaman->created_at)->addDay()) {
            
        // }
        $peminjaman->update();
        return redirect()->back();
    }
}
