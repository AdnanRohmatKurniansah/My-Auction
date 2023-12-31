<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LelangController;
use App\Models\History;
use App\Models\Lelang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Home',
        'lelangs' => Lelang::orderBy('id', 'desc')->paginate(12)
    ]);
});

Route::get('/lelang/{lelang}', function(Lelang $lelang) {
    return view('detailLelang', [
        'title' => 'Detail lelang',
        'lelang' => $lelang,
        'histories' => History::where('lelang_id', $lelang->id)
            ->orderBy('nominal', 'desc')
            ->get()
    ]);
});

Route::middleware(['auth:masyarakat'])->group(function() {
    Route::post('/histories', [HistoryController::class, 'tawar']);
    Route::delete('/histories/{history}', [historieController::class, 'batal']);
    Route::get('/histories/won', function() {
        $auth = Auth::guard('masyarakat')->user();
        return view('history', [
            'title' => 'Lelang yang dimenangkan',
            'histories' => Lelang::where('status', 'ditutup')
                ->where('masyarakat_id', $auth->id)->paginate(10)
        ]);
    });
});

Route::middleware(['guest'])->prefix('auth')->group(function() {
    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'store']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:masyarakat,petugas');

Route::middleware(['auth:petugas'])->prefix('dashboard')->group(function() {
    Route::get('/', function() {
        return view('dashboard.index', [
            'lelang' => Lelang::select(DB::raw('DATE_FORMAT(created_at, "%M") AS date'), DB::raw('COUNT(*) AS count'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%M")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%M")'))
            ->get()
        ]);
    });
    Route::resource('/barang', BarangController::class);
    Route::get('/lelang', [LelangController::class, 'index']);
    Route::middleware(['petugas'])->group(function() {
        Route::get('/lelang/create', [LelangController::class, 'create']);
        Route::post('/lelang', [LelangController::class, 'store']);
        Route::put('/lelang/{lelang}', [LelangController::class, 'close']);
        Route::delete('/lelang/{lelang}', [LelangController::class, 'destroy']);
        Route::get('/lelang/{lelang}', [LelangController::class, 'show']);
        Route::post('/lelang/generate', [LelangController::class, 'generateLaporan']);        
        Route::get('/petugas', [AuthController::class, 'petugas']);
        Route::get('/petugas/create', [AuthController::class, 'tambahPetugas']);
        Route::post('/petugas', [AuthController::class, 'storePetugas']);
        Route::delete('/petugas/{petugas}', [AuthController::class, 'hapusPetugas']);
    });
});