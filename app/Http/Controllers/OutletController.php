<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;

class OutletController extends Controller
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
        $outlets = Outlet::paginate(5);
        return view('outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::get();
        return view('outlet.tambah', compact('outlets'));
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
        ]);

        $outlet = Outlet::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon'],
        ]);

        return redirect()->route('outlet')->with('success', 'Data berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outlets = Outlet::where('id', $id)->first();
        return view('outlet.detail', compact('outlets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlets = Outlet::where('id', $id)->first();
        return view('outlet.edit', compact('outlets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $outlet = Outlet::where('id', $id)->update([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon'],
        ]);

        return redirect()->route('outlet')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Outlet::destroy($id);
        return redirect()->route('outlet')->with('eror', 'Data berhasil Di Hapus');
    }
}
