@extends('layouts.dashboard')

@section('content')
<div class="page-breadcrumb">
    <div class="col-12 align-self-center">
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card border-end">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                @php
                                    $masyarakat = \App\Models\Masyarakat::count();
                                @endphp
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $masyarakat }}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Masyarakat
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            @php
                                $lelangs = \App\Models\Lelang::count();
                            @endphp
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $lelangs }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                Lelang
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="pocket"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                @php
                                    $petugas = \App\Models\Petugas::count();
                                @endphp
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $petugas }}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Petugas
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-check"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            @php
                                $barang = \App\Models\Barang::count();
                            @endphp
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $barang }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Barang</h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="box"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <h4 class="card-title mb-5">Statistik lelang</h4>
                    </div>
                    <div class="pl-4 mb-5">
                        <canvas class="canvas" id="bar-chart" style="height: 100px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            info: '#41B1F9',
            blue: '#3245D1',
            purple: 'rgb(153, 102, 255)',
            grey: '#EBEFF6'
        };

        var ctxBar = document.getElementById("bar-chart").getContext("2d");
        var lelang = JSON.parse('{!! json_encode($lelang) !!}');
        var labels = lelang.map(item => item.date)
        var counts = lelang.map(item => item.count)
        new Chart(ctxBar, {
        type: 'bar',
        data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah lelang',
                    data: counts,
                    backgroundColor: chartColors.blue,
                    barPercentage: 0.1,
                    categoryPercentage: 0.1
                }]
            },
        options: {
            responsive: true,
            barRoundness: 1,
            title: {
            display: false,
            text: "Chart.js - Bar Chart with Rounded Tops (drawRoundedTopRectangle Method)"
                },
            legend: {
                display: false
            },
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true,
                suggestedMax: 40 + 20,
                padding: 10,
                },
                gridLines: {
                drawBorder: false,
                }
            }],
            xAxes: [{
                    gridLines: {
                        display:false,
                        drawBorder: false
                    }
                }]
            }
        }
        })
    })
</script>

@endsection