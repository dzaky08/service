<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    function home(){
        $transaksi = Transaksi::where('status', 'dipesan')->get();
        $data = $transaksi->groupBy('no_kendaraan');
        return view('kasir.home', compact('data'));
    }
    
    function detailkasir($no_kendaraan){
        $data = Transaksi::where('no_kendaraan', $no_kendaraan)->where('status', 'dipesan')->get();
        // $totalharga = $data->sum(function($transaksi){
        //     return $transaksi->service->harga;
        // });
        
        $totalharga = 0;

        foreach ($data as $transaksi) {
            // Hitung total harga untuk setiap transaksi
            $harga = $transaksi->service->harga * $transaksi->qty;
            $hargaTransaksi = $harga + $transaksi->service->harga_jasa;

            // Tambahkan total harga transaksi ke totalharga
            $totalharga += $hargaTransaksi;
            
            // Tambahkan variabel total_harga ke dalam objek transaksi jika diperlukan
            $transaksi->total_harga = $hargaTransaksi;
        }
        return view('kasir.detailkasir', compact('data', 'totalharga'));
    }

    function lunas(Request $request) {
        $request->validate([
            'uang_bayar' => 'required',
            'total_harga' => 'required',
            'uang_kembali' => 'required',
        ]);

        $no_motor = $request->no_kendaraan;
        $transaksi = Transaksi::where('no_kendaraan', $no_motor)->where('status', 'dipesan')->with('service')->get();
    
        foreach ($transaksi as $item) {
            $item->update([
                'kode' => 'INV' . Str::random(10),
                'total_harga' => $request->total_harga,
                'uang_bayar' => $request->uang_bayar,
                'uang_kembali' => $request->uang_kembali,
                'status' => 'lunas'
            ]);
        }

        return redirect()->route('detail-summary', ['no_kendaraan' => $no_motor])->with('msg', 'berhasil melakukan transaksi');
    }
    function detailSummary($no_kendaraan){
        $data = Transaksi::where('no_kendaraan', $no_kendaraan)->where('status', 'lunas')->get();
        
        return view('kasir.detailsummary', compact('data'));
    }

    public function summary()
    {
        $transaksi = Transaksi::where('status', 'lunas')->get();
    
        // Filter transactions with the same 'no_kendaraan' and 'created_at'
        $filteredTransactions = $transaksi->unique(function ($item) {
            return $item->no_kendaraan . $item->created_at;
        });
    
        // Group transactions by 'no_kendaraan'
        $groupedTransactions = $filteredTransactions->groupBy('no_kendaraan');
    
        return view('kasir.summary', compact('groupedTransactions'));
    }

    function pdf() {
        
    }
}