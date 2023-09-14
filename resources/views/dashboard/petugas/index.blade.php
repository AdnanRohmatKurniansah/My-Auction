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
        <div class="col-12">
            <a class="btn btn-primary mb-3" href="/dashboard/petugas/create">Tambah data</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data petugas</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugases as $petugas)  
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $petugas->nama_petugas }}</td>
                                    <td>{{ $petugas->username }}</td>
                                    <td>{{ $petugas->level->level }}</td>
                                    <td class="d-flex fs-1">
                                        <form action="/dashboard/petugas/{{ $petugas->id }}" method="post">
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