<?php

namespace App\Http\Controllers;

use App\Helper\ExportWord;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Peminjaman;
use App\Models\Poli;
use App\Models\RekamMedik;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\TemplateProcessor;
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
            $user = Auth::user();
            if ($user->id == '3') {
                $peminjaman = Peminjaman::with(['rekam_medik', 'status_peminjaman', 'rekam_medik.poli', 'user'])->where('user_id', '=', $user->id)->get();
            } else {
                $peminjaman = Peminjaman::with(['rekam_medik', 'status_peminjaman', 'rekam_medik.poli', 'user'])->get();
            }
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
        $poli = Poli::all();
        return view('admin.peminjaman', compact('poli'));
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
        $auth = Auth::user();
        $input = $request->only(['id_rm', 'keterangan']);
        $id = $auth->id . '-' . Str::random(7) . '-' . $input['id_rm'];
        $input = $input + array('id' => $id, 'waktu_peminjaman' => Carbon::now(), 'user_id' => $auth->id);
        $peminjaman = Peminjaman::create($input);
        $rmd = RekamMedik::with(['poli'])->find($input['id_rm']);
        $templateProcessor = new TemplateProcessor(public_path('template/Slip_Permintaan.docx'));

        // dd();
        $file = public_path('template/Slip_Permintaan.rtf');

        $array = array(
            'peminjaman'=>Peminjaman::with(['rekam_medik','user'])->where('id','=',$id)->first(),
            'id_rm' => $id,
            'nama_pasien' => $rmd->nama_pasien,
            'poli' => $rmd->poli->keterangan,
            'tanggal_pinjam' => Carbon::parse($peminjaman->waktu_peminjaman)->translatedFormat('d F Y'),
        );
        $pdf = Pdf::loadView('layouts.surat.tracer', $array);
        $pdf->setPaper([0,0,300,550], 'landscape');
        return $pdf->stream('tracer.pdf');
        // $nama_file = 'peminjaman.docx';
        // $exp = new ExportWord;

        // if (!file_exists(public_path('upload/ttd') . '_' . $request->nama_terang . '.png')) {
        //     $folderPath = public_path('upload/ttd');

        //     $image_parts = explode(";base64,", $request->signed);

        //     $image_type_aux = explode("image/", $image_parts[0]);

        //     $image_type = $image_type_aux[1];

        //     $image_base64 = base64_decode($image_parts[1]);

        //     $ttd_file = $folderPath . '_' . $request->nama_terang . '.' . $image_type;
        //     file_put_contents($ttd_file, $image_base64);
        // }

        // // $templateProcessor->setValue( '[NO.RM]',$input['id'],);
        // // $templateProcessor->setValue( '[NAMA_PASIEN]' , $rmd->nama_pasien,);
        // // $templateProcessor->setValue( '[POLI]' , $rmd->poli->keterangan,);
        // // $templateProcessor->setValue( '[TANGGAL_PINJAM]' , Carbon::parse($peminjaman->waktu_peminjaman)->translatedFormat('d F Y'),);
        // // $filePath = 
        // $templateProcessor->setValues($array);
        // $templateProcessor->setImageValue('[TTD]', array(
        //     'path' => public_path('upload/ttd') . '_' . $request->nama_terang . '.png',
        //     // 'width' => 100, 'height' => 100, 'ratio' => false
        //     //  'wrappingStyle' => 'infront'
        //     // 'positioning' => 'relative',
        //     'marginTop' => -1,
        //     'marginLeft' => 1,
        //     // 'heigth'=>98,
        //     // 'width' => 300,
        //     // 'wrappingStyle' => 'infront',
        //     'wrapDistanceRight' => Converter::cmToPoint(1),
        //     'wrapDistanceBottom' => Converter::cmToPoint(1),
        // ));
        // $templateProcessor->saveAs($nama_file);
        // return response()->download($nama_file)->deleteFileAfterSend(true);

        // return $exp->export($file, $array, $nama_file);
        // $data = array(
        //     'rm' => $input['id'],
        //     'poli'=>$rmd->poli->keterangan,
        //     'tanggal' => Carbon::parse($peminjaman->waktu_peminjaman)->translatedFormat('d F Y'),
        // );
        // return view('layouts.surat.slip_permintaan',compact('data'));
        /* Set the PDF Engine Renderer Path */
        // $domPdfPath = base_path('vendor/dompdf/dompdf');
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        // \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        // /*@ Reading doc file */
        // $template = new \PhpOffice\PhpWord\TemplateProcessor(public_path('template/Slip_Permintaan.docx'));

        // /*@ Replacing variables in doc file */
        // $template->setValue('[NO.RM]' ,$input['id']);
        // $template->setValue('[POLI]', $rmd->poli->keterangan,);
        // $template->setValue('[TANGGAL_PINJAM]', Carbon::parse($peminjaman->waktu_peminjaman)->translatedFormat('d F Y'));

        // /*@ Save Temporary Word File With New Name */
        // $saveDocPath = public_path('new-result.docx');
        // $template->saveAs($saveDocPath);

        // // Load temporarily create word file
        // $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath); 

        // //Save it into PDF
        // $savePdfPath = public_path('Peminjaman.pdf');

        // /*@ If already PDF exists then delete it */
        // if ( file_exists($savePdfPath) ) {
        //     unlink($savePdfPath);
        // }

        // //Save it into PDF
        // $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        // $PDFWriter->save($savePdfPath); 
        // echo 'File has been successfully converted';

        // /*@ Remove temporarily created word file */
        // if ( file_exists($saveDocPath) ) {
        //     unlink($saveDocPath);
        // }
        // header("Content-type: application/pdf");
        // header("Content-disposition: inline; filename={$savePdfPath}");
        // header("Content-length: ".strlen($savePdfPath));
        // // return redirect()->back();
        // echo $savePdfPath;
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

    public function export(Request $request)
    {
        $peminjaman = Peminjaman::with('rekam_medik')->get();
        $user = Auth::user();
        if (!file_exists(public_path('upload/ttd') . '_' . $request->nama_terang . '.png')) {
            $folderPath = public_path('upload/ttd');

            $image_parts = explode(";base64,", $request->signed);

            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);

            $ttd_file = $folderPath . '_' . $request->nama_terang . '.' . $image_type;
            file_put_contents($ttd_file, $image_base64);
        }
        $data = array(
            'peminjaman' => $peminjaman,
            'tanggal' => Carbon::now()->translatedFormat('d F Y'),
            'user' => $user,
            'file' => public_path('upload/ttd') . '_' . $request->nama_terang . '.png',
        );
        // dd($data['tanggal']);
        $pdf = Pdf::loadView('layouts.surat.laporan', $data);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('laporan_peminjaman.pdf');
    }

    public function verifikasi_peminjaman($id)
    {
        Peminjaman::find($id)->update(['verifikasi_peminjaman' => 'true']);
        return redirect()->back();
    }
}
