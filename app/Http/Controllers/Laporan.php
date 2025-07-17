<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Provinsi;

class Laporan extends Controller
{
    //
    public function index()
    {
        // group by jumlah penduduk per provinsi

        $provinsiCount = Penduduk::with('kabupaten.provinsi')
            ->get()
            ->groupBy(fn($item) => $item->kabupaten->provinsi->nama)
            ->map(fn($items, $nama) => [
                'nama' => $nama,
                'jumlah_penduduk' => $items->count(),
            ])
            ->values();

        // dd($provinsiCount);

        return view('laporan.index', compact('provinsiCount'));
    }

    // print html laporan provinsi
    public function provinsi()
    {
        // This method should return a list of Penduduk grouped by Provinsi.
        $penduduks = Penduduk::with('kabupaten.provinsi')->get();
        $provinsiGrouped = $penduduks->groupBy(function ($item) {
            return $item->kabupaten->provinsi->nama;
        });
        return view('laporan.provinsi', compact('provinsiGrouped'));
    }

    // laporan kabupaten
    public function indexKabupaten(Request $request)
    {
        $provinsi = $request->input('provinsi');

        $kabupatenCount = Penduduk::with('kabupaten.provinsi')
            ->when($provinsi, function ($query, $provinsi) {
                return $query->whereHas('kabupaten.provinsi', function ($q) use ($provinsi) {
                    $q->where('nama', $provinsi);
                });
            })
            ->get()
            ->groupBy(fn($item) => $item->kabupaten->nama)
            ->map(fn($items, $nama_kabupaten) => [
                'nama_provinsi' => $items->first()->kabupaten->provinsi->nama,
                'nama_kabupaten' => $nama_kabupaten,
                'jumlah_penduduk' => $items->count(),
            ])
            ->values();

        // dd($kabupatenCount);
        $provinsi = Provinsi::all();


        return view('laporan/kabupaten', compact('kabupatenCount', 'provinsi'));
    }
}
