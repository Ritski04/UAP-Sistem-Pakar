@extends('layouts.user.app')
@section('title','Diagnosa penyakit kulit')
@section('pagetitle','Diagnosa')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
                <div class="sparkline13-graph">
                    <form action="{{ route('diagnosa.process') }}" method="POST" id="diagnosis-form">
                        @csrf
                        <div class="slide-container">
                            @foreach($gejala as $key => $g)
                            <div class="card slide">
                                <div class="card-body">
                                    <h2 class="card-title">Gejala {{ $key + 1 }}:</h2>
                                    <p class="card-text">Apakah anda mengalami {{ $g->nama_gejala }}</p>
                                    <input type="hidden" name="gejala[]" value="{{ $g->id }}" id="gejala{{ $key }}"
                                        class="gejala-input">
                                    <button type="button" class="btn btn-primary yes-slide"
                                        data-index="{{ $key }}">Iya</button>
                                    @if($key < count($gejala) - 1) <button type="button"
                                        class="btn btn-info next-slide">Selanjutnya</button>
                                        @endif
                                        <button type="submit" class="btn btn-success">Diagnosa</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .slide-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .slide {
        display: none;
        width: 100%;
        margin-bottom: 15px;
    }
    .slide.active {
        display: block;
    }
    .gejala-input {
        display: none;
    }
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        const gejalaInputs = document.querySelectorAll('.gejala-input');
        let currentSlide = 0;

        slides[currentSlide].classList.add('active');

        const showSlide = (index) => {
            slides[currentSlide].classList.remove('active');
            currentSlide = index;
            slides[currentSlide].classList.add('active');
        };

        const nextButtons = document.querySelectorAll('.next-slide');
        const yesButtons = document.querySelectorAll('.yes-slide');

        nextButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => showSlide(index + 1));
        });

        yesButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                gejalaInputs[index].disabled = false;
                if (index < slides.length - 1) {
                    showSlide(index + 1);
                }
            });
        });

        // Initially disable all gejala inputs
        gejalaInputs.forEach(input => input.disabled = true);
    });
</script>
@endsection