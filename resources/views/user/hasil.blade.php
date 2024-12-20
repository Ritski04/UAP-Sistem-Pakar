@extends('layouts.user.app')
@section('title','Hasil diagnosa')
@section('pagetitle','Hasil diagnosa')
@section('content')
<div class="container-fluid">
    <a href="{{ route('diagnosa') }}" class="btn btn-warning mb-3">
        <i class="bx bx-arrow-back"></i> Kembali
    </a>
    <br>
    <br>
    <div class="panel mb-4">
        <div class="panel-heading">
            <h3 class="card-title">Hasil Diagnosa menggunakan Certainty Factor</h3>
        </div>
        <div class="alert alert-info">
            <p>berdasarkan diagnosa yang anda lakukan {{ number_format($cfResults[0]['cf_percentage'], 2) }}% kemungkinan anda menderita {{ $cfResults[0]['penyakit'] }}</p>
        </div>
        <div class="panel-body">
            @if(count($cfResults) > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Penyakit</th>
                            <th scope="col">CF</th>
                            <th scope="col">Persentase</th>
                            <th scope="col">Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cfResults as $result)
                        <tr>
                            <td>{{ $result['penyakit'] }}</td>
                            <td>{{ $result['cf'] }}</td>
                            <td>{{ number_format($result['cf_percentage'], 2) }}%</td>
                            <td>{{ $result['solusi'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>Tidak ada hasil diagnosa yang ditemukan menggunakan metode Certainty Factor.</p>
            @endif
        </div>
    </div>
</div>
@endsection