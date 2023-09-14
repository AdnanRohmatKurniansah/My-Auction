<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function register() {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama_lengkap' => 'required|max:25|min:3',
            'username' => 'required|max:25|min:3|unique:masyarakats',
            'noTelp' => 'required|max:25',
            'password' => 'required|min:5|max:25'
        ]);

        $data['password'] = Hash::make($data['password']);
        
        Masyarakat::create($data);

        return redirect('/auth/login')->with('success', 'Register berhasil');
    }

    public function authenticate(Request $request) {
        $data = $request->validate([
            'username' => 'required|max:25|min:3',
            'password' => 'required|min:5|max:25'
        ]);
    
        if ($request->role == 'masyarakat') {
            if (Auth::guard('masyarakat')->attempt($data)) {
                $request->session()->regenerate();
                return redirect('/')->with('success', 'Berhasil login');
            } else {
                return back()->with('error', 'Username atau password salah');
            }
        } else {
            if (Auth::guard('petugas')->attempt($data)) {
                $request->session()->regenerate();
                return redirect('/dashboard')->with('success', 'Berhasil login');
            } else {
                return back()->with('error', 'Username atau password salah');
            }
        }
    }
    
    public function logout() {
        $guard = Auth::getDefaultDriver();
    
        if ($guard == 'petugas' || $guard == 'masyarakat') {
            Auth::guard($guard)->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }
    
        return redirect('/')->with('info', 'Berhasil logout');
    }
    
    public function petugas() {
        return view('dashboard.petugas.index', [
            'petugases' => Petugas::orderBy('id', 'desc')->get()
        ]);
    }
    
    public function tambahPetugas() {
        return view('dashboard.petugas.create');
    }
    public function storePetugas(Request $request) {
        $data = $request->validate([
            'nama_petugas' => 'required|max:25',
            'username' => 'required|max:25',
            'password' => 'required',
            'level_id' => 'required'
        ]);

        Petugas::create($data);

        return redirect('/dashboard/petugas')->with('success', 'Petugas baru ditambahkan');
    }

    public function hapusPetugas(Petugas $petugas) {
        $petugas->delete();

        return back()->with('success', 'Petugas berhasil dihapus');
    }
}
