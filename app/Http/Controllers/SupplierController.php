<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::latest()->get();
        return view('supplier.index', ['supplier' => $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'nama' => 'required|min:3',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Minimal 3 karakter'
        ]);
        $data['phone'] = $request->phone;
        $data['alamat'] = $request->alamat;
        $data['deskripsi'] = $request->deskripsi;

        Supplier::create($data);
        return redirect('supplier')->with('success', 'Supplier berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('supplier.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|min:3',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Minimal 3 karakter'
        ]);

        $data['phone'] = $request->phone;
        $data['alamat'] = $request->alamat;
        $data['deskripsi'] = $request->deskripsi;

        $supplier = Supplier::find($id);
        $supplier->update($data);
        return redirect('supplier')->with('success', 'Supplier berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($supplier);
        Supplier::destroy($id);
        return redirect('supplier')->with('success', 'Data berhasil dihapus');
    }
}
