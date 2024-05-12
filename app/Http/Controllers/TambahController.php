<?php

namespace App\Http\Controllers;

use App\Models\Tambah;
use Illuminate\Http\Request;

class TambahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $max = 5;
        if (request('search')) {
            $data = Tambah::where('nama', 'like', '%'.request('search').'%')->paginate($max);
        } else {
            $data = Tambah::orderBy('nama', 'asc')->paginate($max);
        }
        
        return view('Toko.produk', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'nama.required' => 'Input Harus diisi!',
            'harga.required' => 'Input Harus diisi!',
            'harga.integer' => 'Input harus angka',
            'stok.required' => 'Input Harus diisi!',
            'stok.integer' => 'Input harus angka',
            'gambar.required' => 'Input harus diisi',
            'gambar.image' => 'Input harus gambar',
            'gambar.mimes' => 'ekstensi file harus jpeg, png, dan jpg',
            'gambar.max' => 'Ukuran gambar maximal 2 Mb' 
        ]);

        $namaGambar = time(). '.'.$request->gambar->extension();
        $request->gambar->move(public_path('img'), $namaGambar);

        $data = [
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'gambar'=> $namaGambar,
        ];

        Tambah::create($data);

        return redirect()->route('produk.index')->with('success', 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tambah::findorfail($id);
        return view('Toko.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'nama.required' => 'Input Harus diisi!',
            'harga.required' => 'Input Harus diisi!',
            'harga.integer' => 'Input harus angka',
            'stok.required' => 'Input Harus diisi!',
            'stok.integer' => 'Input harus angka',
            'gambar.required' => 'Input harus diisi',
            'gambar.image' => 'Input harus gambar',
            'gambar.mimes' => 'ekstensi file harus jpeg, png, dan jpg',
            'gambar.max' => 'Ukuran gambar maximal 2 Mb' 
        ]);

        $namaGambar = time(). '.'.$request->gambar->extension();
        $request->gambar->move(public_path('img'), $namaGambar);

        $data = [
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'gambar'=> $namaGambar,
        ];

        Tambah::where('id', $id)->update($data);
        return redirect()->route('produk.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tambah::where('id', $id)->delete();
        return redirect()->route('produk.index')->with('success', 'Berhasil Menghapus Data');
    }
}