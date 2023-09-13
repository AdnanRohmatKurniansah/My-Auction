@extends('layouts.main')

@section('content')
    <div class="detail" style="padding-top: 100px; padding-bottom: 100px; background-color: #F6F9FE">
        <div class="container">
            <h3 class="pb-3"><span class="badge bg-primary">Detail lelang</span></h3>
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('storage/' . $lelang->barang->image) }}" alt="">
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled fs-5">
                        <li class="mb-2"><span class="fw-bold">Nama barang:</span> {{ $lelang->barang->nama }}</li>
                        <li class="mb-2"><span class="fw-bold">Harga barang: </span>Rp. {{ number_format($lelang->barang->harga_awal, 0, ',', '.') }}</li>
                        <li class="mb-2"><span class="fw-bold">Status lelang: </span><span class="badge bg-primary">{{ $lelang->status }}</span></li>
                    </ul>
                    @auth('masyarakat')
                    @php
                        $massa = Auth::guard('masyarakat')->user()->id;
                        $exist = \App\Models\Penawaran::where('masyarakat_id', $massa)->first();
                    @endphp
                    @if ($exist)
                        <form action="/penawaran/{{ $exist->id }}" method="post">
                            @method('delete')
                            @csrf
                            <label class="mb-2 fs-5" for="nominal">Tawaranmu: </label>
                            <input type="text" disabled value="Rp. {{ number_format($exist->nominal, 0, ',', '.') }}" name="nominal" id="nominal" class="form-control">
                            <button onclick="return confirm('Batalkan tawaran?')" class="btn btn-danger my-2" type="submit">Batalkan</button>
                        </form>
                    @endauth
                    @else
                        <form action="/penawaran" method="post">
                            @csrf
                            <label class="mb-3" for="nominal">Tawar barang ini</label>
                            <div class="input-group mb-3">
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
                </div>
            </div>
            <div class="penawaran py-5">
                <h3 class="d-flex pb-3 justify-content-center">Penawaran</h3>
                @php
                    $penawaran = \App\Models\Penawaran::where('lelang_id', $lelang->id)->get();
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
                        @foreach ($penawarans as $penawaran)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $penawaran->masyarakat->nama_lengkap }}</td>
                            <td>Rp. {{ number_format($penawaran->nominal, 0, ',', '.') }}</td>
                            <td>{{ $penawaran->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection