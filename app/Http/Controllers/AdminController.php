<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function dash() {
        $service = Service::all();

        return view('admin.dashboard', compact('service'));
    }

    function tambah() {
        $service = Service::all();

        return view('admin.tambah', compact('service'));
    }
    function postTambah(Request $request) {
        
    }

    function log() {
    //     $logs = DB::table('users')
    // ->join('logs', 'users.id', '=', 'logs.user_id')
    // ->whereIn('users.role', ['montir', 'kasir'])
    // ->select('users.nama', 'logs.aktivitas', 'logs.created_at')
    // ->get();
    }
}
