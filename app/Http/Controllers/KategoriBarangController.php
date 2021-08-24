<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBarang;
use Database\Factories\KategoriBarangFactory;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriBarang::latest()->get();
        return view('kategori-barang.index', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori-barang.create');
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
            'nama_kategori' => 'required'
        ],[
            'nama-kategori.required' => 'Nama Kategori harus diisi'
        ]);

        $data['deskripsi'] = $request->deskripsi;

        KategoriBarang::create($data);
        return redirect('/kategoriBarang')->with('success', 'Kategori Barang berhasil ditambahkan');
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
        $data = KategoriBarang::find($id);
        return view('kategori-barang.edit', ['data' => $data]);
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
        $data = $request->validate([
            'nama_kategori' => 'required'
        ],[
            'nama-kategori.required' => 'Nama Kategori harus diisi'
        ]);

        $data['deskripsi'] = $request->deskripsi;

        $kategori = KategoriBarang::find($id);
        $kategori->update($data);
        return redirect('/kategoriBarang')->with('success', 'Kategori Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriBarang::destroy($id);
        return redirect('/kategoriBarang')->with('success', 'Kategori Barang berhasil dihapus');
    }
}
