<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Outlet;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {
        $countOutlets = Outlet::all()->count();
        $countPenggunas = User::all()->count();
        $countPelanggans = Pelanggan::all()->count();
        $countPakets = Paket::all()->count();
        return view('dashboard', compact('countOutlets', 'countPenggunas', 'countPelanggans', 'countPakets'));
    }
}
