<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class KasirController extends Controller
{
    function home(){
        // Dapatkan data transaksi yang dipesan
        $dipesan = Transaksi::where('status', 'dipesan')->get();

        // Dapatkan jumlah transaksi yang dipesan berdasarkan grup no_kendaraan
        $jmlhdipesan = Transaksi::where('status', 'dipesan')
            ->groupBy('no_kendaraan')
            ->selectRaw('no_kendaraan, count(*) as jumlah')
            ->get();

        // Dapatkan data transaksi yang lunas
        $lunas = Transaksi::where('status', 'lunas')->get();

        // Dapatkan jumlah transaksi yang lunas berdasarkan grup no_kendaraan
        $jmlhlunas = Transaksi::where('status', 'lunas')
            ->groupBy('no_kendaraan')
            ->selectRaw('no_kendaraan, count(*) as jumlah')
            ->get();

        return view('kasir.home', compact('dipesan', 'jmlhdipesan', 'lunas', 'jmlhlunas'));
    }
    function dipesan(){
        $transaksi = Transaksi::where('status', 'dipesan')->get();
        $data = $transaksi->groupBy('no_kendaraan');
        return view('kasir.dipesan', compact('data'));
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
                'status' => 'lunas',
            ]);
        }

        return redirect()->route('detail-summary', ['no_kendaraan' => $no_motor])->with('msg', 'berhasil melakukan transaksi');
    }
    function detailSummary($no_kendaraan){
        $data = Transaksi::where('no_kendaraan', $no_kendaraan)->where('status', 'lunas')->get();

        $harga = $data->sum(function ($transaksi) {
            return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
        });
        
        return view('kasir.detailsummary', compact('data','harga'));
    }

    public function summary()
    {
        $transaksi = Transaksi::where('status', 'lunas')->with('service')->get();
        $pemasukan = $transaksi->sum(function ($transaksi) {
            return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
        });
    
        // Filter transactions with the same 'no_kendaraan' and 'created_at'
        $filteredTransactions = $transaksi->unique(function ($item) {
            return $item->no_kendaraan . $item->created_at;
        });
    
        // Group transactions by 'no_kendaraan'
        $groupBy = $filteredTransactions->groupBy('no_kendaraan');
    
        return view('kasir.summary', compact('groupBy', 'pemasukan'));
    }
    public function filter(Request $request)
    {
        // Mendapatkan tanggal awal dan akhir dari request
        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

        // Menyaring transaksi berdasarkan rentang tanggal yang dipilih
        $transaksis = Transaksi::whereBetween('updated_at', [$start_date, $end_date])
                           ->where('status', 'lunas')
                           ->with('service')
                           ->get();

        // Menghitung total pemasukan dari transaksi yang telah disaring
        $pemasukan = $transaksis->sum(function ($transaksi) {
             return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
        });

    // Menyaring transaksi dengan 'no_kendaraan' dan 'created_at' yang sama
        $filteredTransactions = $transaksis->unique(function ($item) {
            return $item->no_kendaraan . $item->created_at;
        });

    // Mengelompokkan transaksi berdasarkan 'no_kendaraan'
        $groupBy = $filteredTransactions->groupBy('no_kendaraan');

    // Mengirimkan data ke view 'transaksi' bersama dengan total pemasukan
        return view('kasir.summary', compact('groupBy', 'pemasukan'));
    }   
    
    public function pdf($no_kendaraan) {
        
        $transaksi = Transaksi::where('no_kendaraan', $no_kendaraan)->where('status', 'lunas')->get();
        $invoice = $transaksi->first()->kode; // Mengambil kode dari transaksi pertama

        
        
        // // Mendapatkan satu transaksi dengan nomor kendaraan yang sama dan status 'lunas'
        // $transaksi = Transaksi::where('no_kendaraan', $no_kendaraan)->where('status', 'lunas')->get();
        // $invoice = $transaksi->first()->kode; // Mengambil kode dari transaksi pertama
    
        // // Sekarang Anda dapat menggunakan $transaksi untuk membuat file PDF
        $data = [
            'data' => $transaksi
        ];
    
        $pdf = PDF::loadView('kasir.pdf-summary', $data);
        return $pdf->download($invoice . '.pdf'); // Menggunakan $invoice untuk menamai file PDF
    }

    function pdfsum(Request $request){
        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

        $transaksi = Transaksi::where('status', 'lunas')
                    ->with('service')
                    ->whereBetween('updated_at', [$start_date, $end_date])
                    ->get();

        $pemasukan = $transaksi->sum(function ($transaksi) {
            return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
        });
    
        // Filter transactions with the same 'no_kendaraan' and 'created_at'
        $filteredTransactions = $transaksi->unique(function ($item) {
            return $item->no_kendaraan . $item->updated_at;
        });
    
        // Group transactions by 'no_kendaraan'
        $groupBy = $filteredTransactions->groupBy('no_kendaraan');

        $data = [
            'data' => $groupBy,
            'pemasukan' => $pemasukan
        ];
    
        $pdf = PDF::loadView('kasir.pdf-report', $data);
        return $pdf->download(now() . '.pdf'); // Menggunakan $invoice untuk menamai file PDF
    }
}
