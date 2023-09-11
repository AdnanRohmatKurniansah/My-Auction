@extends('layouts.blank')

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
style="background:url(/assets/admin/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="auth-box row d-flex justify-content-center">
        <div class="col-lg-7 bg-white">
            <div class="p-3">
                <h2 class="mt-3 text-center">Register</h2>
                <form class="mt-4" action="/auth/register" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="nama_lengkap">Nama Lengkap</label>
                                <input class="form-control @error('nama_lengkap') is-invalid @enderror" required name="nama_lengkap" id="nama_lengkap" type="text"
                                    placeholder="Masukkan Nama Lengkap">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="username">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" required name="username" id="username" type="text"
                                    placeholder="Masukkan Username">
                                @error('username')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="noTelp">No Telp</label>
                                <input class="form-control @error('noTelp') is-invalid @enderror" required name="noTelp" id="noTelp" type="text"
                                    placeholder="Masukkan No Telp">
                                @error('noTelp')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" required name="password" id="password" type="password"
                                    placeholder="Masukkan Password">
                                @error('password')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark">Register</button>
                        </div>
                        <div class="col-lg-12 text-center mt-5">
                            Punya Akun? <a href="/auth/login" class="text-danger">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>
@endsection