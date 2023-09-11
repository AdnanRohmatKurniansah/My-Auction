@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Data barang</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary mb-3" href="/dashboard/barang/create">Tambah data</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data barang</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Image</th>
                                    <th>Tanggal</th>
                                    <th>Harga awal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $barang->image) }}" width="80" alt="">
                                    </td>
                                    <td>{{ $barang->tgl }}</td>
                                    <td>Rp. {{ number_format($barang->harga_awal, 0, ',', '.') }}</td>
                                    <td class="d-flex fs-2">
                                        <a href="/dashboard/barang/{{ $barang->id }}/edit" style="margin-right: 10px">
                                          <i class="badge-circle badge-circle-light-secondary" data-feather="edit"></i>
                                        </a>
                                        <form action="/dashboard/barang/{{ $barang->id }}" method="post">
                                          @method('delete')
                                          @csrf
                                          <button class="badge-circle badge-circle-light-secondary border-0" style="background-color: transparent; color: red" onclick="return confirm('Hapus barang ini?')" type="submit">
                                            <i data-feather="trash"></i>
                                          </button>
                                        </form>
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

@endsection