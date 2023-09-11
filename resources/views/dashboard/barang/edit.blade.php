@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Edit barang</li>
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
                    <h4 class="card-title mb-3">Edit barang</h4>
                    <div class="row">
                        <form action="/dashboard/barang/{{ $barang->id }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="nama">Nama Barang</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $barang->nama) }}" required name="nama" id="nama" type="text"
                                        placeholder="Masukkan Nama Barang">
                                    @error('nama')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="harga_awal">Harga awal</label>
                                    <input class="form-control @error('harga_awal') is-invalid @enderror" value="{{ old('harga_awal', $barang->harga_awal) }}" required name="harga_awal" id="harga_awal" type="text"
                                        placeholder="Masukkan Harga awal">
                                    @error('harga_awal')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="tgl">Tanggal</label>
                                    <input class="form-control @error('tgl') is-invalid @enderror" value="{{ old('tgl', $barang->tgl) }}" required name="tgl" id="tgl" type="date">
                                    @error('tgl')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi barang" name="deskripsi" id="deskripsi" cols="30" rows="5" required autofocus>{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input type="hidden" name="oldImage" value="{{ $barang->image }}">
                                    <label for="image" class="form-label">Image</label>
                                    @if ($barang->image)
                                        <img src="{{ asset('storage/' . $barang->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="text-end m-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>

@endsection