@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Tambah data</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Tambah data</h4>
                    <div class="row">
                        <form action="/dashboard/petugas" method="post">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="nama_petugas">Nama Petugas</label>
                                    <input class="form-control @error('nama_petugas') is-invalid @enderror" value="{{ old('nama_petugas') }}" required name="nama_petugas" id="nama_petugas" type="text"
                                        placeholder="Masukkan Nama Petugas">
                                    @error('nama_petugas')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="username">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required name="username" id="username" type="text"
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
                                    <label class="form-label text-dark" for="level_id">Level</label>
                                    <select class="form-select @error('level_id') is-invalid @enderror" name="level_id">
                                        <option value="1">Petugas</option>
                                        <option value="2">Administrator</option>
                                    </select>
                                    @error('level_id')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required name="password" id="password" type="password"
                                        placeholder="Masukkan password">
                                    @error('password')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end m-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection