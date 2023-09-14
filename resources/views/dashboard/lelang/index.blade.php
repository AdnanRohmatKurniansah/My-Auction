@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Data Lelang</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    @if (Auth::guard('petugas')->user()->level_id == 1)
                        <a class="btn btn-primary mb-3" href="/dashboard/lelang/create">Buka lelang baru</a>
                    @endif
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Generate Laporan
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data barang</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Image</th>
                                    <th>Harga akhir</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lelangs as $lelang)  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lelang->barang->nama }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $lelang->barang->image) }}" width="80" alt="">
                                    </td>
                                    <td>
                                        @if ($lelang->harga_akhir == null)
                                            Belum ada
                                        @else
                                            Rp. {{ number_format($lelang->harga_akhir, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td>{{ $lelang->petugas->nama_petugas }}</td>
                                    <td>
                                        @if ($lelang->status == 'dibuka')
                                            <p class="badge bg-info">{{ $lelang->status }}</p>
                                        @else
                                            <p class="badge bg-danger">{{ $lelang->status }}</p>
                                        @endif
                                    </td>
                                    <td class="d-flex fs-1">
                                        <a href="/dashboard/lelang/{{ $lelang->id }}" style="margin-right: 10px">
                                            <i class="badge-circle badge-circle-light-secondary" data-feather="eye"></i>
                                        </a>
                                        @if (Auth::guard('petugas')->user()->level_id == 1)
                                            @if ($lelang->status == 'dibuka')
                                            <form action="/dashboard/lelang/{{ $lelang->id }}" method="post">
                                                @method('put')
                                                @csrf
                                                <button class="badge-circle badge-circle-light-secondary border-0" style="background-color: transparent; color: rgb(10, 10, 65); margin-right: 10px" onclick="return confirm('Tutup lelang ini?')" type="submit">
                                                <i data-feather="power"></i>
                                                </button>
                                            </form>
                                            @endif
                                            <form action="/dashboard/lelang/{{ $lelang->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="badge-circle badge-circle-light-secondary border-0" style="background-color: transparent; color: red" onclick="return confirm('Hapus lelang ini?')" type="submit">
                                                <i data-feather="trash"></i>
                                            </button>
                                            </form>
                                        @endif
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Generate laporan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/lelang/generate" method="post">
            @csrf
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="dari">Dari: </label>
                        <input class="form-control" required name="dari" id="dari" type="date"
                            placeholder="Dari">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="sampai">Sampai: </label>
                        <input class="form-control" required name="sampai" id="sampai" type="date"
                            placeholder="Sampai">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection