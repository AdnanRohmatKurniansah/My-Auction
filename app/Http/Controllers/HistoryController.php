<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function tawar(Request $request) {
        $data = $request->validate([
            'nominal' => 'required|max:20',
            'barang_id' => 'required',
            'lelang_id' => 'required'
        ]);

        $data['masyarakat_id'] = Auth::guard('masyarakat')->user()->id;

        History::create($data);

        return back()->with('success', 'Penawaran dikirim');
    }

    public function batal(History $history) {
        $history->delete();

        return back()->with('info', 'Tawaranmu dibatalkan');
    }
}
