@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Informasi Lelang</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary mb-3" href="/dashboard/lelang">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mb-3">Informasi barang</h4>
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('storage/' . $lelang->barang->image) }}" width="100%" alt="">
                                </div>
                                <div class="col">
                                    <ul>
                                        <li class="mb-3"><span class="fw-bold">Nama barang:</span> {{ $lelang->barang->nama }}</li>
                                        <li class="mb-3"><span class="fw-bold">Tanggal:</span> {{ $lelang->barang->created_at->format('d M Y') }}</li>
                                        <li class="mb-3"><span class="fw-bold">Harga awal:</span> Rp. {{ number_format($lelang->barang->harga_awal, 0, ',', '.') }}</li>
                                        <li class="mb-3"><span class="fw-bold">Deskripsi:</span> </li>
                                    </ul>
                                </div>
                                <p>{{ $lelang->barang->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title mb-3">Informasi lelang</h4>
                            <ul>
                                <li class="mb-3"><span class="fw-bold">Nama petugas:</span> {{ $lelang->petugas->nama_petugas }}</li>
                                <li class="mb-3"><span class="fw-bold">Pemenang:</span> {{ $lelang->masyarakat->nama_lengkap ?? 'Belum ada' }}</li>
                                <li class="mb-3"><span class="fw-bold">Harga akhir:</span> 
                                    @if ($lelang->harga_akhir == null)  
                                        Belum ada
                                    @else
                                        Rp. {{ number_format($lelang->harga_akhir, 0, ',', '.') }}
                                    @endif
                                </li>
                                <li class="mb-3">
                                <span class="fw-bold">
                                    @if ($lelang->status == 'dibuka')
                                        Status: <p class="badge bg-info">{{ $lelang->status }}</p>
                                    @else
                                        Status: <p class="badge bg-danger">{{ $lelang->status }}</p>
                                    @endif
                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection