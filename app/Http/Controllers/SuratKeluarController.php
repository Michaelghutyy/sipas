<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\SuratKeluarRequest;
use App\Models\SuratMasuk;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = SuratKeluar::all();
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    $pathToFile = asset('storage/file-surat-keluar/' . $item->fileSurat);    
                    return '
                        <a class="btn btn-warning" href="' . route('surat-keluar.edit', $item->id) . '">
                            <i class="fas fa-pencil"></i> Ubah  
                        </a>
                        <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-trash"></i> Hapus  
                        </button>
                        <a class="btn btn-info" href="' . route('surat-keluar.show', $item->id) . '">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        ';
                        // <a download class="btn btn-success" href="' . $pathToFile .'">
                        //     <i class="fas fa-file-download"></i> Download File Surat
                        // </a> 
                })
                ->editColumn('tglpembuatanSurat', function($item) {
                    return '    
                        ' . Carbon::parse($item->tglpembuatanSurat)->format('d M Y') . '
                    ';
                })
                ->editColumn('tglpengirimanSurat', function($item) {
                    return '
                        ' . Carbon::parse($item->tglpengirimanSurat)->format('d M Y') . '
                    ';
                })
                ->rawColumns(['action', 'tglpembuatanSurat', 'tglpengirimanSurat'])
                ->addIndexColumn()
                ->make();
        }
        return view('pages.suratkeluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggal = Carbon::now();
        $kode = "CIB/IMP-MT";
        $bulanSurat = SuratKeluar::getRomawi($tanggal->month);
        $tahunSurat = substr($tanggal->year, 2, 2);

        $data = SuratKeluar::get()->max('kodesuratKeluar');
        
        if($data == null){
            $kodeSurat = '001/'.$kode.'/'.$bulanSurat.'/'.$tahunSurat;
        }else{
            $noSurat = substr($data, 0, 3);
            $noSurat = ++$noSurat;
            $noSurat = sprintf("%03s", $noSurat);
            $kodeSurat = $noSurat.'/'.$kode.'/'.$bulanSurat.'/'.$tahunSurat;
        }

        return view('pages.suratkeluar.create', [
            'kodeSurat' => $kodeSurat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratKeluarRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('fileSurat')) {
            $data['fileSurat'] = $request->fileSurat->getClientOriginalName();  
            $request->fileSurat->storeAs('file-surat-keluar', $data['fileSurat'], 'public');
        }
        SuratKeluar::create($data);
        return redirect()->route('surat-keluar.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SuratKeluar::findOrFail($id);
        return view('pages.suratkeluar.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SuratKeluar::findOrFail($id);
        return view('pages.suratkeluar.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratKeluarRequest $request, $id)
    {
        $cek = SuratKeluar::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('fileSurat')) {
            $data['fileSurat'] = $request->fileSurat->getClientOriginalName();  
            $request->fileSurat->storeAs('file-surat-keluar', $data['fileSurat'], 'public');
        }
        $cek->update($data);
        return redirect()->route('surat-keluar.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratKeluar::findOrFail($id);
        $data->delete();

        return response()->json($data);
    }

    public function laporan() {
        $today = Carbon::now()->format('d M Y');

        $data = SuratKeluar::orderBy('tglpembuatanSurat', 'DESC')->get();
        $pdf = PDF::loadView('laporan.laporansuratkeluar', [
            'data'  => $data,
            'title' => 'Laporan Surat Keluar',
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-surat-keluar-' . $today . '.pdf');
    }
}
