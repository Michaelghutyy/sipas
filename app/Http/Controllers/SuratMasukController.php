<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Requests\SuratMasukRequest;
use Yajra\DataTables\Facades\DataTables;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = SuratMasuk::all();
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    $pathToFile = asset('storage/file-surat-masuk/' . $item->fileSurat);    
                    return '
                        <a class="btn btn-warning" href="' . route('surat-masuk.edit', $item->id) . '">
                            <i class="fas fa-pencil"></i> Ubah  
                        </a>
                        <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-trash"></i> Hapus  
                        </button>
                        <a class="btn btn-info" href="' . route('surat-masuk.show', $item->id) . '">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a download class="btn btn-success" href="' . $pathToFile .'">
                            <i class="fas fa-file-download"></i> Download File Surat
                        </a>
                        <a class="btn btn-primary" href="' . route('disposisi.index') . '">
                            <i class="fas fa-tasks"></i> Disposisi
                        </a>

                    ';
                })
                ->editColumn('tglSurat', function($item) {
                    return '    
                        ' . Carbon::parse($item->tglSurat)->format('d M Y') . '
                    ';
                })
                ->editColumn('tglsuratMasuk', function($item) {
                    return '
                        ' . Carbon::parse($item->tglsuratMasuk)->format('d M Y') . '
                    ';
                })
                ->rawColumns(['action', 'tglSurat', 'tglsuratMasuk'])
                ->addIndexColumn()
                ->make();
        }

        return view('pages.suratmasuk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suratmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratMasukRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('fileSurat')) {
            $data['fileSurat'] = $request->fileSurat->getClientOriginalName();  
            $request->fileSurat->storeAs('file-surat-masuk', $data['fileSurat'], 'public');
        }

        SuratMasuk::create($data);
        return redirect()->route('surat-masuk.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SuratMasuk::findOrFail($id);
        return view('pages.suratmasuk.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SuratMasuk::findOrFail($id);
        $disposisi = Disposisi::all();
        return view('pages.suratmasuk.edit', compact('data', 'disposisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratMasukRequest $request, $id)
    {
        $cek = SuratMasuk::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('fileSurat')) {
            $data['fileSurat'] = $request->fileSurat->getClientOriginalName();  
            $request->fileSurat->storeAs('file-surat-masuk', $data['fileSurat'], 'public');
        }
        $cek->update($data);
        return redirect()->route('surat-masuk.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratMasuk::findOrFail($id);
        $data->delete();

        return response()->json($data);
    }
}
