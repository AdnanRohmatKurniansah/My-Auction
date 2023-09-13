@extends('layouts.main')

@section('content')
    <div class="detail" style="padding-top: 100px; padding-bottom: 100px; background-color: #F6F9FE">
        <div class="container">
            <h3 class="pb-3"><span class="badge bg-primary">Detail lelang</span></h3>
            <div class="row pb-5">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('storage/' . $lelang->barang->image) }}" alt="">
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled fs-6">
                        <li class="mb-2"><span class="fw-bold">Nama barang:</span> {{ $lelang->barang->nama }}</li>
                        <li class="mb-2"><span class="fw-bold">Harga barang: </span>Rp. {{ number_format($lelang->barang->harga_awal, 0, ',', '.') }}</li>
                        <li class="mb-2"><span class="fw-bold">Status lelang: </span><span class="badge bg-primary">{{ $lelang->status }}</span></li>
                        <li class="mb-2"><span class="fw-bold">Deskripsi:</span> {{ $lelang->barang->deskripsi }}</li>
                    </ul>
                    @if ($lelang->status == 'dibuka')
                        @php
                            $massa = Auth::guard('masyarakat')->user();
                            if ($massa) {
                                $id = $massa->id;
                                $exist = \App\Models\History::where('lelang_id', $lelang->id)
                                    ->where('masyarakat_id', $id)->first();
                            } else {
                                $exist = null; 
                            }
                        @endphp
                        @if ($exist)
                            <form action="/histories/{{ $exist->id }}" method="post">
                                @method('delete')
                                @csrf
                                <label class="mb-2 fs-5" for="nominal">Tawaranmu: </label>
                                <input type="text" disabled value="Rp. {{ number_format($exist->nominal, 0, ',', '.') }}" name="nominal" id="nominal" class="form-control">
                                <button onclick="return confirm('Batalkan tawaran?')" class="btn btn-danger my-2" type="submit">Batalkan</button>
                            </form>
                        @else
                            <form action="/histories" method="post">
                                @csrf
                                <label class="mb-3" for="nominal">Tawar barang ini</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="barang_id" value="{{ $lelang->barang->id }}">
                                    <input type="hidden" name="lelang_id" value="{{ $lelang->id }}">
                                    <input type="number" required min="1" name="nominal" id="nominal" class="form-control @error('nominal') is-invalid @enderror" placeholder="nominal" aria-label="nominal">
                                    @error('nominal')
                                        <div class="invalid-feedback justify-content-start text-left">
                                            {{ $message }}
                                        </div>            
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
            @if ($lelang->status == 'ditutup')
            <div class="winner" style="position: relative; width: 100%; height: 350px; text-align: center;">
                <img src="/assets/dist/img/winner.png" alt="Winner Image" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                <h3 class="text-center text-primary" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    Selamat kepada <span class="text-info text-decoration-underline">{{ $lelang->masyarakat->nama_lengkap }}</span> telah memenangkan lelang ini!!
                </h3>
            </div>
            @endif
            <div class="penawaran py-5">
                <h3><span class="badge bg-primary">Penawaran</span></h3>
                <hr>
                @php
                    $penawaran = \App\Models\History::where('lelang_id', $lelang->id)->get();
                @endphp
                @if ($penawaran->isEmpty())
                    <div class="null d-flex justify-content-center">
                        <h4 class="my-5">Belum ada yg menawar sama sekali...</h4>
                    </div>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Masyarakat</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $history->masyarakat->nama_lengkap }}</td>
                            <td>Rp. {{ number_format($history->nominal, 0, ',', '.') }}</td>
                            <td>{{ $history->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection