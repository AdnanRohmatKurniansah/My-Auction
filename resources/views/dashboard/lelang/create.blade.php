@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Buka lelang</li>
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
                    <h4 class="card-title mb-3">Buka lelang baru</h4>
                    <div class="row">
                        <form action="/dashboard/lelang" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label text-dark" for="barang_id">Barang</label>
                                    <select class="form-select @error('barang_id') is-invalid @enderror" name="barang_id" aria-label="Default select example">
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end m-3">
                                <button type="submit" class="btn btn-primary">Buka</button>
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