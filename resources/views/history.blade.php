@extends('layouts.main')

@section('content')
    <div class="history" id="history" style="margin-top: 100px; background-color: #F6F9FE; padding-bottom: 100px; min-height: 500px">
        <div class="container">
            <h3 class="py-4 pt-5 d-flex justify-content-center"><span class="badge bg-primary">Lelang yang anda menangkan</span></h3>
            @if ($histories->isEmpty())
            <div class="empty d-flex justify-content-center align-items-center" style="height: 30vh">
                <h3>Anda belum memenangkan lelang manapun...</h3>
            </div>            
            @else
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Harga awal</th>
                        <th scope="col">Tawaranmu</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $history->barang->nama }}</td>
                            <td>Rp. {{ number_format($history->barang->harga_awal, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($history->harga_akhir, 0, ',', '.') }}</td>
                            <td>{{ $history->updated_at->format('d M Y') }}</td>
                            <td>
                                <a class="btn btn-primary" href="/lelang/{{ $history->id }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex mt-5 justify-content-center">
                    {{ $histories->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection