<?php

namespace App\Http\Controllers;

use App\Models\LevelHarga;
use Illuminate\Http\Request;

class LevelHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = LevelHarga::latest()->get();
        return view('level-harga.index', ['level' => $level]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('level-harga.create');
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
            'nama_level' => 'required'
        ], [
            'nama_level.required' => 'Nama Level harus diisi'
        ]);

        $data['deskripsi'] = $request->deskripsi;

        LevelHarga::create($data);
        return redirect('/levelHarga')->with('success', 'Level harga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LevelHarga  $levelHarga
     * @return \Illuminate\Http\Response
     */
    public function show(LevelHarga $levelHarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LevelHarga  $levelHarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = LevelHarga::find($id);
        return view('level-harga.edit', ['data' => $level]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LevelHarga  $levelHarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_level' => 'required'
        ], [
            'nama_level.required' => 'Nama Level harus diisi'
        ]);

        $data['deskripsi'] = $request->deskripsi;

        $level = LevelHarga::find($id);
        $level->update($data);
        return redirect('/levelHarga')->with('success', 'Level harga berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevelHarga  $levelHarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LevelHarga::destroy($id);
        return redirect('/levelHarga')->with('success', 'Level Harga berhasil dihapus');
    }
}
