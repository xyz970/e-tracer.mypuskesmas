<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $peminjaman = Peminjaman::with(['rekam_medik', 'status_peminjaman', 'rekam_medik.poli', 'user'])->get();
            return DataTables::of($peminjaman)
                ->addColumn('detail', function ($item) {
                    return '<button onclick="update(' . $item->id . ')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons fa fa-info"></span></button>';
                })
                ->addColumn('verifikasi_peminjaman_btn', function ($item) {
                    if ($item->verifikasi_peminjaman == 'false') {
                        return '<a href="' . route('peminjaman.verifikasi_peminjaman', ['id' => $item->id]) . '" class="btn btn-primary">Verifikasi</a>';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('status_keterlambatan', function ($item) {
                    if ($item->status_id == '1') {
                        return '-';
                    } else {
                        if ($item->terlambat == 'true') {
                            return '<span class="badge rounded-pill badge-danger">Terlambat</span>';
                        } else {
                            return '<span class="badge rounded-pill badge-success">Tepat Waktu</span>';
                        }
                    }
                })
                ->addColumn('verifikasi_peminjaman', function ($item) {

                    if ($item->verifikasi_peminjaman == 'false') {
                        return '<span class="badge rounded-pill badge-danger">Belum Diverifikasi</span>';
                    } else {
                        return '<span class="badge rounded-pill badge-success">Telah Diverifikasi</span>';
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['detail', 'status_keterlambatan', 'verifikasi_peminjaman', 'verifikasi_peminjaman_btn'])
                ->make(true);
        }
        return view('admin.laporan');
    }

    public function export(Request $request)
    {
        if ($request->has('date')) {
            $input = $request->only(['date']);
            $date = explode("-", $input['date'], 2);
            $firstDate = Carbon::parse(trim($date[0], ' '));
            $secondDate = Carbon::parse(trim($date[1], ' '));
            $peminjaman = Peminjaman::with('rekam_medik')->whereBetween('waktu_peminjaman', [$firstDate, $secondDate])->get();
        } else {
            $peminjaman = Peminjaman::with('rekam_medik')->get();
        }

        $user = Auth::user();
        $data = array(
            'peminjaman' => $peminjaman,
            'tanggal' => Carbon::now()->translatedFormat('d F Y'),
            'user' => $user,
        );
        // dd($data['tanggal']);
        $pdf = Pdf::loadView('layouts.surat.laporan', $data);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('laporan_peminjaman.pdf');
    }
}
