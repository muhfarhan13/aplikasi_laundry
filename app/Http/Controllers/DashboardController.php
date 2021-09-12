<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $countOutlets = Outlet::all()->count();
        // $countMembers = Member::all()->count();
        return view('home');
    }
}
