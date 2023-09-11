@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Tambah barang</li>
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
                    <h4 class="card-title mb-3">Tambah barang</h4>
                    <div class="row">
                        <form action="/dashboard/barang" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="nama">Nama Barang</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required name="nama" id="nama" type="text"
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
                                    <input class="form-control @error('harga_awal') is-invalid @enderror" value="{{ old('harga_awal') }}" required name="harga_awal" id="harga_awal" type="text"
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
                                    <input class="form-control @error('tgl') is-invalid @enderror" value="{{ old('tgl') }}" required name="tgl" id="tgl" type="date">
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
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi barang" name="deskripsi" id="deskripsi" cols="30" rows="5" required autofocus>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
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
                                <button type="submit" class="btn btn-primary">Tambah</button>
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