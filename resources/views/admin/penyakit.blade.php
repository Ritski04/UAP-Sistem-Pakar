@extends('layouts.admin.app')
@section('title','kelola data penyakit')
@section('pagetitle','Penyakit')
@section('content')
<button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah"><i
        class="fas fa-plus"></i>Tambah data</button>
{{-- modal tambah data --}}
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penyakit.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="kode">Kode Penyakit</label>
                            <input type="kode" class="form-control" id="kode" name="kode" value="{{ old('kode') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="penyakit">Nama Penyakit</label>
                            <input type="text" class="form-control" id="penyakit" name="penyakit"
                                value="{{ old('penyakit') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="4"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="solusi">Solusi</label>
                            <textarea name="solusi" id="solusi" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="basic-datatables" class="display table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Penyakit</th>
                <th>Deskripsi</th>
                <th>Solusi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Penyakit</th>
                <th>Deskripsi</th>
                <th>Solusi</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @php
            $no = 1
            @endphp
            @foreach ($penyakit as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->kode_penyakit }}</td>
                <td>{{ $item->nama_penyakit }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->solusi }}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-sm btn-outline-primary mr-2" data-bs-toggle="modal"
                        data-bs-target='#edit{{ $item->id }}'><i class="fas fa-edit"></i></button>
                    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('penyakit.update',$item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="kode">Kode Penyakit</label>
                                                <input type="kode" class="form-control" id="kode" name="kode"
                                                    value="{{ old('kode',$item->kode_penyakit) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penyakit">Nama Penyakit</label>
                                                <input type="text" class="form-control" id="penyakit" name="penyakit"
                                                    value="{{ old('penyakit',$item->nama_penyakit) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="4"
                                                    class="form-control">{{ old('deskripsi',$item->deskripsi) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="solusi">Solusi</label>
                                                <textarea name="solusi" id="solusi" cols="30" rows="4"
                                                    class="form-control">{{ old('solusi',$item->solusi) }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target='#hapus{{ $item->id }}'><i class="fas fa-trash"></i></button>
                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin ingin menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('penyakit.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection