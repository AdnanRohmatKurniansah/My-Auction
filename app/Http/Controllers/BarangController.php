<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.barang.index', [
            'barangs' => Barang::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:25',
            'harga_awal' => 'required|max:20',
            'deskripsi' => 'required|max:100|min:5',
            'image' => 'image|file|max:2048'
        ]);

        if($request->file('image')) {
            $data['image'] = $request->file('image')->store('barang-images');
        } 

        $data['harga_awal'] = (int)$data['harga_awal'];

        Barang::create($data);

        return redirect('/dashboard/barang')->with('success', 'Berhasil tambah data baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('dashboard.barang.edit', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'nama' => 'required|max:25',
            'harga_awal' => 'required|max:20',
            'deskripsi' => 'required|max:100|min:5',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('barang-images');
        }   

        $data['harga_awal'] = (int)$data['harga_awal'];

        $barang->update($data);

        return redirect('/dashboard/barang')->with('info', 'Berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if ($barang->image) {
            Storage::delete($barang->image);
        }

        $barang->delete();

        return redirect('/dashboard/barang')->with('success', 'Berhasil hapus barang');
    }
}
