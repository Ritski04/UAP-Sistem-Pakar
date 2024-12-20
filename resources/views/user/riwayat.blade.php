@extends('layouts.user.app')
@section('title', 'Riwayat Diagnosa')
@section('content')
<div class="container">
    <h3>Riwayat Diagnosa</h3>
    <hr>
    {{-- @dd($riwayatDetail) --}}
    <button type="button" class="btn btn-sm btn-outline-danger"
        data-bs-toggle="{{ $riwayatDetail->isEmpty() ? '' : 'modal' }}"
        data-bs-target="{{ $riwayatDetail->isEmpty() ? '' : '#hapus' . Auth::user()->id }}"
        {{ $riwayatDetail->isEmpty() ? 'disabled' : '' }}>
        <i class="fas fa-trash"></i> Hapus riwayat
    </button>
    <div class="modal fade" id="hapus{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Apakah anda yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('hapus.riwayat', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @if($riwayatDetail->isEmpty())
    <p>Tidak ada riwayat diagnosa yang ditemukan.</p>
    @else
    @foreach($riwayatDetail as $date => $detail)
    <div class="card my-3">
        <div class="card-header">
            {{-- @dd($date) --}}
            <h5>Tanggal Diagnosa: {{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y H:i') }}</h5>
        </div>
        <div class="card-body">
            <h6>Hasil Diagnosa Terbesar: {{ $detail['highest_cf']->penyakit->nama_penyakit }}
                ({{ $detail['highest_cf']->hasilcf }}%)
            </h6>
            <p>Solusi: {{ $detail['highest_cf']->penyakit->solusi }}</p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                data-bs-target="#detail-{{ Str::slug($date) }}">
                Lihat Detail
            </button>
            <div class="collapse mt-3" id="detail-{{ Str::slug($date) }}">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Hasil CF</th>
                            <th>Solusi</th>
                            <th>Waktu Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail['data'] as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->penyakit->nama_penyakit }}</td>
                            <td>{{ $item->hasilcf }}</td>
                            <td>{{ $item->penyakit->solusi }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection
