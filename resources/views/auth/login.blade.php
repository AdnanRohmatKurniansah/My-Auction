@extends('layouts.blank')

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
style="background:url(/assets/admin/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="auth-box row d-flex justify-content-center">
        <div class="col-lg-7 bg-white">
            <div class="p-3">
                <h2 class="mt-3 text-center">Login</h2>
                <form class="mt-4" action="/auth/login" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="username">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" type="text"
                                    placeholder="Masukkan Username" required>
                                @error('username')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="role">Role</label>
                                <select class="form-select @error('role') is-invalid @enderror" name="role" aria-label="Default select example">
                                    <option value="masyarakat">Masyarakat</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-label text-dark" for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" required id="password" name="password" type="password"
                                    placeholder="Masukkan Password">
                                @error('password')
                                    <div class="invalid-feedback justify-content-start text-left">
                                        {{ $message }}
                                    </div>            
								@enderror
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark">Login</button>
                        </div>
                        <div class="col-lg-12 text-center mt-5">
                            Tidak punya akun? <a href="/auth/register" class="text-danger">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection