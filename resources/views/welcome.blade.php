@extends('layouts.main')

@section('content')
<div class="home">
    <div class="hero" style="padding-top: 100px; padding-bottom: 100px; background: linear-gradient(to left, #3ca4ee, #283caf)">
        <div class="container text-white">
            <div class="row">
                <div class="col-md-7 p-5 my-auto">
                    <h2>Selamat datang di platform lelang</h2>
                    <h5 class="mt-4">Temukan pengalaman lelang yang mengagumkan di sini. Dapatkan kesempatan untuk menemukan barang-barang unik dan langka dari berbagai kategori. Sertai komunitas kami yang aktif dan berpartisipasi dalam lelang terbaru.</h5>
                    <a href="" class="btn btn-primary fw-bold my-3">Menawar sekarang <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-md-5 p-5">
                    <img src="/assets/dist/img/auction.gif" class="img-fluid" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="lists" id="lists" style="margin: 100px 0">
        <div class="container">
            <h3 class="pb-2 d-flex justify-content-center"><span class="badge bg-primary">List barang</span></h3>
            <h5 class="pb-4 d-flex justify-content-center">Tawarkan harga dan menangkan lelang!</h5>
            <div class="row">
                @foreach ($lelangs as $lelang)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $lelang->barang->image) }}" class="card-img-top" style="min-height: 230px; max-height: 230px" alt="...">
                        <div class="card-body">
                        <h6 class="card-title">Status: <span class="badge {{ $lelang->status == 'dibuka' ? 'bg-primary' : 'bg-danger' }}">{{ $lelang->status }}</span></h6>
                        <h6 class="card-title">Nama barang: {{ $lelang->barang->nama }}</h6>
                        <h6 class="card-text">Harga barang: Rp. {{ number_format($lelang->barang->harga_awal, 0, ',', '.') }}</h6>
                        <a href="/lelang/{{ $lelang->id }}" class="btn btn-primary">{{ $lelang->status == 'dibuka' ? 'Tawar' : 'Lihat hasil' }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="history" id="history" style="margin-top: 100px; background-color: #F6F9FE; padding-bottom: 100px; min-height: 600px">
        <div class="container">
            <h3 class="py-2 pt-5 d-flex justify-content-center"><span class="badge bg-primary">History lelang</span></h3>
            <h5 class="pb-4 d-flex justify-content-center">Daftar history lelang, Cek hasil lelang anda disini</h5>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
