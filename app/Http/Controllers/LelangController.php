<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use App\Models\Lelang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    public function index() {
        return view('dashboard.lelang.index', [
            'lelangs' => Lelang::orderBy('id', 'desc')->get()
        ]);
    }

    public function create() {
        $lelang = Lelang::all()->pluck('barang_id');

        return view('dashboard.lelang.create', [
            'barangs' => Barang::whereNotIn('id', $lelang)->get()
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'barang_id' => 'required',
        ]);

        $data['petugas_id'] = Auth::guard('petugas')->user()->id;
        $data['status'] = 'dibuka';

        Lelang::create($data);

        return redirect('/dashboard/lelang')->with('success', 'Lelang baru dibuka');
    }

    public function show(Lelang $lelang) {
        return view('dashboard.lelang.show', [
            'lelang' => $lelang
        ]);
    }

    public function close(Lelang $lelang) {
        $bestOffer = History::where('lelang_id', $lelang->id)
            ->orderBy('nominal', 'desc')->first();

        $lelang->update([
            'status' => 'ditutup',
            'harga_akhir' => $bestOffer->nominal,
            'masyarakat_id' => $bestOffer->masyarakat_id
        ]);

        return back()->with('info', 'Lelang berhasil ditutup');
    }

    public function destroy(Lelang $lelang) {
        $lelang->delete();

        return back()->with('success', 'Lelang dihapus');
    }

    public function generateLaporan(Request $request) {
        $dari = $request->dari;
        $sampai = $request->sampai;

        $data = Lelang::whereBetween('updated_at', [$dari, $sampai])->get();

        if ($data->count() < 1) {
            return back()->with('error', 'Lelang tidak ditemukan');
        }

        $pdf = Pdf::loadView('dashboard.laporan', [
            'data' => $data
        ]);
        return $pdf->download('laporan.pdf');
    }
}
