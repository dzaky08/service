<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Transaksi;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    function home() {
        $transaksis = Transaksi::where('status', 'lunas')->with('service')->get();

        $filteredTransactions = $transaksis->unique(function ($item) {
            return $item->no_kendaraan . $item->updated_at;
        });

        $groupBy = $filteredTransactions->groupBy('no_kendaraan');
        $groupByDate = $transaksis->groupBy(function ($item) {
            return Carbon::parse($item->updated_at)->format('d-m-Y');
        });
    
        $tanggal = [];
        $pemasukan = [];
    
        foreach ($groupByDate as $date => $transactions) {
            $totalPemasukanHariIni = 0;
    
            foreach ($transactions as $transaksi) {
                $totalPemasukanHariIni += ($transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa);
            }
    
            $tanggal[] = $date;
            $pemasukan[] = $totalPemasukanHariIni;
        }

        array_multisort($tanggal, SORT_ASC, $pemasukan);
        $totalpemasukan = array_sum($pemasukan);

        $chart = (new LarapexChart)->setType('bar')
            ->setSubtitle('dari transaksi Hari Ini')
            ->setXAxis($tanggal)
            ->setDataset([
                [
                    'name' => 'pemasukan',
                    'data' => $pemasukan
                ]
            ]);

        return view('owner.home', compact('chart', 'totalpemasukan', 'groupBy', 'groupByDate'));
    }

    function filterowner(Request $request) {
        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

        $transaksis = Transaksi::whereBetween('updated_at', [$start_date, $end_date])
                           ->where('status', 'lunas')
                           ->with('service')
                           ->get();
        

        // Menyaring transaksi dengan 'no_kendaraan' dan 'created_at' yang sama
        $filteredTransactions = $transaksis->unique(function ($item) {
            return $item->no_kendaraan . $item->created_at;
        });

        // Mengelompokkan transaksi berdasarkan 'no_kendaraan'
        $groupBy = $filteredTransactions->groupBy('no_kendaraan');
        $groupByDate = $transaksis->groupBy(function ($item) {
            return Carbon::parse($item->updated_at)->format('d-m-Y');
        });
    
        $tanggal = [];
        $pemasukan = [];
    
        foreach ($groupByDate as $date => $transactions) {
            $totalPemasukanHariIni = 0;
    
            foreach ($transactions as $transaksi) {
                $totalPemasukanHariIni += ($transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa);
            }
    
            $tanggal[] = $date;
            $pemasukan[] = $totalPemasukanHariIni;
        }

        array_multisort($tanggal, SORT_ASC, $pemasukan);
        // $totalpemasukan = array_sum($pemasukan);
        
        $chart = (new LarapexChart)->setType('bar')
        ->setTitle('Pemasukan')
        ->setSubtitle('dari transaksi Hari Ini')
        ->setXAxis($tanggal)
        ->setDataset([
            [
                'name' => 'pemasukan',
                'data' => $pemasukan
                ]
            ]);
            
            $totalpemasukan = array_sum($pemasukan);
    // Mengirimkan data ke view 'transaksi' bersama dengan total pemasukan
        return view('owner.home', compact('chart', 'totalpemasukan', 'groupBy', 'groupByDate'));
    }


    function logowner() {
        $logs = Log::all();

        return view('owner.log', compact('logs'));
    }
    public function filterlog(Request $request)
    {
        // Mendapatkan tanggal awal dan akhir dari request
        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

        // Menyaring transaksi berdasarkan rentang tanggal yang dipilih
        $logs = Log::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('owner.log', compact('logs'));
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
    
        return view('owner.report', compact('groupBy', 'pemasukan'));
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
        return view('owner.report', compact('groupBy', 'pemasukan'));
    } 
    function pdfsum(){
        $transaksi = Transaksi::where('status', 'lunas')->with('service')->get();
        $pemasukan = $transaksi->sum(function ($transaksi) {
            return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
        });
    
        // Filter transactions with the same 'no_kendaraan' and 'created_at'
        $filteredTransactions = $transaksi->unique(function ($item) {
            return $item->no_kendaraan . $item->created_at;
        });
    
        // Group transactions by 'no_kendaraan'
        $groupedTransactions = $filteredTransactions->groupBy('no_kendaraan');
    
        return view('kasir.summary', compact('groupedTransactions', 'pemasukan'));
    }
}

// public function summary()
// {
//     $transaksi = Transaksi::where('status', 'lunas')->with('service')->get();
//     $pemasukan = $transaksi->sum(function ($transaksi) {
//         return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
//     });

//     // Filter transactions with the same 'no_kendaraan' and 'created_at'
//     $filteredTransactions = $transaksi->unique(function ($item) {
//         return $item->no_kendaraan . $item->created_at;
//     });

//     // Group transactions by 'no_kendaraan'
//     $groupBy = $filteredTransactions->groupBy('no_kendaraan');

//     return view('kasir.summary', compact('groupBy', 'pemasukan'));
// }
// public function filter(Request $request)
// {
//     // Mendapatkan tanggal awal dan akhir dari request
//     $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
//     $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

//     // Menyaring transaksi berdasarkan rentang tanggal yang dipilih
//     $transaksis = Transaksi::whereBetween('updated_at', [$start_date, $end_date])
//                        ->where('status', 'lunas')
//                        ->with('service')
//                        ->get();

//     // Menghitung total pemasukan dari transaksi yang telah disaring
//     $pemasukan = $transaksis->sum(function ($transaksi) {
//          return $transaksi->service->harga * $transaksi->qty + $transaksi->service->harga_jasa;
//     });

// // Menyaring transaksi dengan 'no_kendaraan' dan 'created_at' yang sama
//     $filteredTransactions = $transaksis->unique(function ($item) {
//         return $item->no_kendaraan . $item->created_at;
//     });

// // Mengelompokkan transaksi berdasarkan 'no_kendaraan'
//     $groupBy = $filteredTransactions->groupBy('no_kendaraan');

// // Mengirimkan data ke view 'transaksi' bersama dengan total pemasukan
//     return view('kasir.summary', compact('groupBy', 'pemasukan'));
// }