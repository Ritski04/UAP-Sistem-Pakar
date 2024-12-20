@extends('layouts.user.app')
@section('title','My dashboard')
@section('pagetitle','My Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-3" data-bs-toggle="modal" data-bs-target="#profile">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-user-alt"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category" data-bs-toggle="tooltip" title="tekan untuk melihat profil">My Profile</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3" data-bs-toggle="modal" data-bs-target="#change">
            <div class="card card-stats card-round">
                <div class="card-body">
                <a href="{{ route('diagnosa') }}" class="collapsed" aria-expanded="false">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                            <i class="fas fa-diagnoses"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category" data-bs-toggle="tooltip" title="Diagnosa penyakit">Diagnosa</p>
                            </div>
                        </div>
                    </div>
                </div></a>
            </div>
        </div>
    </div>
    
    </div>
    @endsection
