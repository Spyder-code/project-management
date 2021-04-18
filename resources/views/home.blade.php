@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->role=='admin')
                                <div id="testnilai" class="col-lg-12"></div>
                            @else
                            <div class="col-lg-12">
                                <div class="card border border-warning">
                                    <div class="card-header bg-warning text-white text-center">Presense {{ date('d F Y') }}</div>
                                    <div class="card-body">
                                        @if ($karyawan!=null)
                                        <h4>Masuk pada {{ date('d F Y H:i:s', strtotime($karyawan->time_start)) }}</h4>
                                        <form action="{{ route('absen.end') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="type" value="1">
                                            <input type="hidden" name="id" value="{{ $karyawan->id }}">
                                            <button class="btn btn-danger" type="submit">Absen Keluar</button>
                                        </form>
                                        @elseif($karyawanAbsen==null)
                                        <form action="{{ route('absen.post') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="type" value="0">
                                            <button class="btn btn-success" type="submit">Absen Masuk</button>
                                        </form>
                                        @else
                                            <h4>Sudah absen</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                <div id="testnilai" class="col-lg-12"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

<script>
    // Build the chart
    var a = {{ json_encode($yes) }}
    var b = {{ json_encode($no) }}
    console.log(a);
    console.log(b);
Highcharts.chart('testnilai', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Absen',
            y: {!! json_encode($yes) !!},
        }, {
            name: 'Belum absen',
            y: {!! json_encode($no) !!}
        }]
    }]
});
</script>
@endsection

