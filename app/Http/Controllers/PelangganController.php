<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::paginate(5);
        return view('pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string'],
            'jenis_kelamin' => ['required']
        ]);

        $pelanggan = Pelanggan::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon'],
            'jenis_kelamin' => $request['jenis_kelamin'],
        ]);

        return redirect()->route('pelanggan')->with('success', 'Data berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggans = Pelanggan::where('id', $id)->first();
        return view('pelanggan.detail', compact('pelanggans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggans = Pelanggan::where('id', $id)->first();
        return view('pelanggan.edit', compact('pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pelanggan = Pelanggan::where('id', $id)->update([
            'nama' => $request['nama'],
            'telepon' => $request['telepon'],
            'alamat' => $request['alamat'],
            'jenis_kelamin' => $request['jenis_kelamin'],
        ]);

        return redirect()->route('pelanggan')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route('pelanggan')->with('eror', 'Data berhasil Di Hapus');
    }
}
