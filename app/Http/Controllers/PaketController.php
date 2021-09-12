<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
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
        $pakets = Paket::paginate(5);
        return view('paket.index', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::get();
        return view('paket.tambah', compact('outlets'));
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
            'nama' => ['required'],
            'jenis' => ['required'],
            'harga' => ['required'],
            'outlet' => ['required'],
        ]);

        $outlet = Paket::create([
            'nama_paket' => $request['nama'],
            'jenis' => $request['jenis'],
            'harga' => $request['harga'],
            'outlet_id' => $request['outlet'],
        ]);

        return redirect()->route('paket')->with('success', 'Data berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pakets = Paket::where('id', $id)->first();
        return view('paket.detail', compact('pakets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pakets = Paket::where('id', $id)->first();
        $outlets = Outlet::get();

        return view('paket.edit', compact('pakets', 'outlets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $paket = Paket::where('id', $id)->update([
            'nama_paket' => $request['nama'],
            'jenis' => $request['jenis'],
            'harga' => $request['harga'],
            'outlet_id' => $request['outlet'],
        ]);

        return redirect()->route('paket')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paket::destroy($id);
        return redirect()->route('paket')->with('eror', 'Data berhasil Di Hapus');
    }
}
