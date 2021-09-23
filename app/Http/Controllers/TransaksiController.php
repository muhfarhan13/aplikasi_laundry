<?php

namespace App\Http\Controllers;

use App\Models\Detail_transaksi;
use App\Models\Pelanggan;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
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
        $transaksis = Transaksi::paginate(5);
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transaksi.create', ['paket' => Paket::where('outlet_id', '=', Auth::user()->outlet_id)->get(), 'pelanggan' => Pelanggan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $this->validate($request, ['*' => 'required'], ['required' => ':attribute Tidak Boleh Kosong!']);
        $paket = Paket::where('id', $request->paket_id)->first();
        $data = new Transaksi();
        $data->invoice_kode = $request->invoice_kode;
        $data->outlet_id = Auth::user()->outlet_id;
        $data->pelanggan_id = $request->pelanggan_id;
        $data->paket_id = $request->paket_id;
        $data->qty = $request->qty;
        $total = $request->qty * $paket->harga;
        $ppn = $total * 10 / 100;
        $total_harga = $total + $ppn;
        $data->total_harga = $total_harga;
        $data->keterangan = 'belum_dibayar';
        $data->status = 'baru';
        $data->save();
        return redirect('/transaksi')->with('success','data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.detail',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksi=Transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi');
    }
    public function konfirmasi(Request $request)
    {
        # code...
        // dd($request->has('transaksi'));
        if (!$request->has('transaksi')) {
            # code...
            return redirect()->back()->withErrors('Tidak Ada Yang Dapat Di Proses!');
        }else{
            // dd($request->transaksi);
            for ($i=0; $i < count($request->transaksi); $i++) { 
                # code...
                $data = Transaksi::find($request->transaksi[$i]);
                $data->keterangan = 'dibayar';
                $data->save();
            }
            return redirect()->back()->withErrors('Proses Berhasil!');
        }
        // $this->validate($request,['*'=>'required'],['required'=>'Tidak Ada Yang Dapat Di Proses']);
    }
    // <form action="{{ route('transaksi_hapus',$transaksi->id) }}"> <a href="/transaksi/{{ $transaksi->id }}/edit" class="btn btn-success">
    //                                         <i class="far fa-edit"></i>
    //                                     </a>
    //                                     @csrf
    //                                     <button type="submit" class="btn btn-danger">Hapus
    //                                     </button>
    //                                 </form>
}
