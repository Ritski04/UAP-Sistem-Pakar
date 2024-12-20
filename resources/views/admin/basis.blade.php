@extends('layouts.admin.app')
@section('title','Kelola data basis pengetahuan')
@section('pagetitle','Basis Pengetahuan')
@section('content')
<button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah"><i
        class="fas fa-plus"></i>Tambah data</button>
{{-- modal tambah data --}}
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('basis.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <div class="col-md-12 mb-3">
                            <label for="penyakit">Kode Penyakit</label>
                            <select name="penyakit" id="penyakit" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($penyakit as $item)
                                <option value="{{ $item->id }}">{{ $item->kode_penyakit }} | {{ $item->nama_penyakit }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pilih</th>
                                        <th>Gejala</th>
                                        <th>MB</th>
                                        <th>MD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1
                                    @endphp
                                    @foreach ($gejala as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><input type="checkbox" name="idgejala[]" id="{{ $item->id }}"
                                                value="{{ $item->id }}"></td>
                                        <td><label for="{{ $item->id }}">{{ $item->nama_gejala }}</label></td>
                                        <td>
                                            <select name="idmb[{{ $item->id }}]" id="idmb[{{ $item->id }}]"
                                                class="form-control">
                                                <option value="">--pilih--</option>
                                                @foreach ($nilai as $n)
                                                <option value="{{ $n->id }}">{{ $n->nilai }} -- {{ $n->keterangan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="idmd[{{ $item->id }}]" id="idmd[{{ $item->id }}]"
                                                class="form-control">
                                                <option value="">--pilih--</option>
                                                @foreach ($nilai as $n)
                                                <option value="{{ $n->id }}">{{ $n->nilai }} -- {{ $n->keterangan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                <th>Penyakit</th>
                <th>Gejala</th>
                <th>MB</th>
                <th>MD</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Penyakit</th>
                <th>Gejala</th>
                <th>MB</th>
                <th>MD</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @php
            $no = 1
            @endphp
            @foreach ($basis as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->penyakit->nama_penyakit }}</td>
                <td>{{ $item->gejala->nama_gejala }}</td>
                <td>{{ $item->mb->nilai }}</td>
                <td>{{ $item->md->nilai }}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-sm btn-outline-primary mr-2" data-bs-toggle="modal"
                            data-bs-target='#edit{{ $item->id }}'><i class="fas fa-edit"></i></button>
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('basis.update',$item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="idpenyakit">Penyakit</label>
                                                    <select name="idpenyakit" id="idpenyakit" class="form-control">
                                                        <option value="{{ old('idpenyakit',$item->penyakit->id) }}">{{ old('idpenyakit',$item->penyakit->nama_penyakit) }}</option>
                                                        @foreach ($penyakit as $p)
                                                            <option value="{{ $p->id }}">{{ $p->nama_penyakit }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="idgejala">Deskripsi</label>
                                                    <select name="idgejala" id="idgejala" class="form-control">
                                                        <option value="{{ old('idgejala',$item->gejala->id) }}">{{ old('idgejala',$item->gejala->nama_gejala) }}</option>
                                                        @foreach ($gejala as $g)
                                                            <option value="{{ $g->id }}">{{ $g->nama_gejala }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="idmb">MB</label>
                                                    <select name="idmb" id="idmb" class="form-control">
                                                        <option value="{{ old('idmb',$item->mb->nilai) }}">{{ old('idmb',$item->mb->nilai) }} -- {{ old('idmb',$item->mb->keterangan) }}</option>
                                                        @foreach ($nilai as $n)
                                                            <option value="{{ $n->id }}">{{ $n->nilai }} -- {{ $n->keterangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="idmd">MD</label>
                                                    <select name="idmd" id="idmd" class="form-control">
                                                        <option value="{{ old('idmd',$item->md->nilai) }}">{{ old('idmd',$item->md->nilai) }} -- {{ old('idmd',$item->md->keterangan) }}</option>
                                                        @foreach ($nilai as $n)
                                                            <option value="{{ $n->id }}">{{ $n->nilai }} -- {{ $n->keterangan }}</option>
                                                        @endforeach
                                                    </select>
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
                        <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <form action="{{ route('basis.destroy', $item->id) }}" method="POST">
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