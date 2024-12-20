@extends('layouts.admin.app')
@section('title','Kelola data pengguna')
@section('pagetitle','Pengguna')
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
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ old('username') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Gender</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">--Pilih--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="no_hp">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($user as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->gender }}</td>
                <td>
                    <div class="d-inline">
                        <button type="button" class="btn btn-sm btn-outline-primary mr-2" data-bs-toggle="modal"
                        data-bs-target='#detail{{ $item->id }}'><i class="fas fa-list"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target='#hapus{{ $item->id }}'><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            {{-- modal detail data --}}
            <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="detail-tab{{ $item->id }}" data-bs-toggle="tab"
                                        data-bs-target="#detail-tab-pane{{ $item->id }}" type="button" role="tab"
                                        aria-controls="detail-tab-pane{{ $item->id }}"
                                        aria-selected="true">Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="edit-tab{{ $item->id }}" data-bs-toggle="tab"
                                        data-bs-target="#edit-tab-pane{{ $item->id }}" type="button" role="tab"
                                        aria-controls="edit-tab-pane{{ $item->id }}" aria-selected="false">Edit
                                        Data</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="detail-tab-pane{{ $item->id }}"
                                    role="tabpanel" aria-labelledby="detail-tab{{ $item->id }}">
                                    <div class="row mt-3">
                                        <div class="col-lg-3">
                                            <p>Nama</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p>Username</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->username }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p>Email</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p>Alamat</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->alamat }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p>TTL</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->tempat_lahir }}/{{ $item->tanggal_lahir }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p>No. HP</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->hp }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <p>Gender</p>
                                        </div>
                                        <div class="col-lg-1">:</div>
                                        <div class="col-lg-8">
                                            <p>{{ $item->gender }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="edit-tab-pane{{ $item->id }}" role="tabpanel"
                                    aria-labelledby="edit-tab{{ $item->id }}">
                                    <form action="{{ route('pengguna.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name',$item->nama) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    value="{{ old('username',$item->username) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ old('email',$item->email) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value="{{ old('alamat',$item->alamat) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="jenis_kelamin">Gender</label>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                    <option value="Laki-laki"
                                                        {{ $item->gender=='Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ $item->gender=='Perempuan' ? 'selected' : '' }}>Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir"
                                                    value="{{ old('tempat_lahir',$item->tempat_lahir) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir',$item->tanggal_lahir) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_hp">No. HP</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value="{{ old('no_hp',$item->hp) }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal hapus data --}}
            <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                            <form action="{{ route('pengguna.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection