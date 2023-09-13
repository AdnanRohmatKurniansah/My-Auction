<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenawaranController extends Controller
{
    public function tawar(Request $request) {
        $data = $request->validate([
            'nominal' => 'required',
            'lelang_id' => 'required'
        ]);

        $data['masyarakat_id'] = Auth::guard('masyarakat')->user()->id;

        Penawaran::create($data);

        return back()->with('success', 'Penawaran dikirim');
    }

    public function batal(Penawaran $penawaran) {
        $penawaran->delete();

        return back()->with('info', 'Tawaranmu dibatalkan');
    }
}
