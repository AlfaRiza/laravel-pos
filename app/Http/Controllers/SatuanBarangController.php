<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = SatuanBarang::latest()->get();
        return view('satuan-barang.index', ['satuan' => $satuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_satuan' => 'required'
        ], [
            'nama_satuan.required' => 'Nama satuan harus diisi'
        ]);

        $data['deskripsi'] = $request->deskripsi;
        SatuanBarang::create($data);
        return redirect('/satuanBarang')->with('success', 'Satuan Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanBarang $satuanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SatuanBarang::find($id);
        return view('satuan-barang.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_satuan' => 'required'
        ],[
            'nama_satuan.required' => 'Nama harus diisi'
        ]);

        $satuan = SatuanBarang::find($id);
        $satuan->update($data);
        return redirect('satuanBarang')->with('success', 'Satuan Barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SatuanBarang::destroy($id);
        return redirect('/satuanBarang')->with('success', 'Satuan Barang berhasil dihapus');
    }
}
