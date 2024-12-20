<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasifikasi MBTI dengan Naive Bayes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }
        .header h1 {
            font-size: 3em;
            margin: 0;
        }
        .main-content {
            padding: 50px 0;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">Skinnie ExS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <h1>Sistem Pakar Diagnosa Penyakit Kulit</h1>
            <p>Solusi cerdas untuk mendiagnosa penyakit kulit dengan metode <strong>Certainty Factor</strong></p>
            <a href="{{ route('auth.login') }}" class="btn btn-primary btn-lg">Mulai Sekarang</a>
        </div>
    </header>

    <section id="about" class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2>Tentang sistem kami</h2>
                    <p>Sistem pakar penyakit kulit adalah aplikasi cerdas yang bertujuan membantu pengguna mendiagnosa penyakit kulit yang mungkin diderita. Menggunakan metode <strong>Certainty factor</strong>, sistem ini memberikan hasil yang akurat berdasarkan gejala-gejala yang dipilih pengguna.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="main-content bg-light">
        <div class="container">
            <h2>Fitur Utama</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Analisis Cepat</h3>
                            <p class="card-text">Dapatkan hasil diagnosa dalam hitungan detik dengan akurasi tinggi menggunakan algoritma Certainty Factor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Antarmuka Intuitif</h3>
                            <p class="card-text">Nikmati antarmuka yang mudah digunakan dan dirancang untuk pengalaman pengguna yang optimal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Keamanan Data</h3>
                            <p class="card-text">Data Anda aman bersama kami. Kami memastikan privasi dan keamanan informasi Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Dukungan Multi Bahasa</h3>
                            <p class="card-text">Aplikasi kami mendukung berbagai bahasa untuk kenyamanan pengguna di seluruh dunia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Grafik Interaktif</h3>
                            <p class="card-text">Visualisasikan hasil klasifikasi dengan grafik interaktif yang mudah dipahami.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Laporan Detail</h3>
                            <p class="card-text">Dapatkan laporan detail mengenai hasil klasifikasi Anda dengan penjelasan lengkap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="main-content">
        <div class="container">
            <h2>Kontak Kami</h2>
            <form>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                </div>
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Pesan Anda"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 MBTI Naive Bayes. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
</body>
</html>
