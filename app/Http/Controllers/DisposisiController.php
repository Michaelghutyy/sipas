<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Disposisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $query = Disposisi::all();
            return Datatables::of($query)
                ->addColumn('action', function ($item) {    
                    return '
                        <a class="btn btn-warning" href="' . route('disposisi.edit', $item->id) . '">
                            <i class="fas fa-pencil"></i> Ubah  
                        </a>
                        <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash"></i> Hapus  
                        </button>
                        <a class="btn btn-info" href="' . route('disposisi.show', $item->id) . '">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    ';
                })
                ->editColumn('batasWaktu', function($item) {
                    return '    
                        ' . Carbon::parse($item->batasWaktu)->format('d M Y') . '
                    ';
                })
                ->rawColumns(['action', 'batasWaktu'])
                ->addIndexColumn()
                ->make();
        }
        return view('pages.disposisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.disposisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Disposisi::create($data);

        return redirect()->route('disposisi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Disposisi::findOrFail($id);
        return view('pages.disposisi.show', compact('data'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Disposisi::findOrFail($id);
        return view('pages.disposisi.edit', compact('data'));
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
        $data = Disposisi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('disposisi.index')->with('success', 'Data berhasil diubah');
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
