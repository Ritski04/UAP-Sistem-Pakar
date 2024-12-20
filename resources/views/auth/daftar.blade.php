<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Forms - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('') }}assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('') }}assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('') }}assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/plugins.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/demo.css" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <div class="container">
            <div class="header mt-5 mb-5 text-center">
                <h2>Welcome</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('auth.daftar.process') }}" method="POST">
                                @csrf
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

                                
                                <div class="form-group row">
    <div class="col-md-12">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
</div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">Daftar</button>
                                </div>
                            </form>
                            <p>Sudah punya akun? <a href="{{ route('auth.login') }}">Login</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('') }}assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('') }}assets/js/core/popper.min.js"></script>
    <script src="{{ asset('') }}assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('') }}assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="{{ asset('') }}assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('') }}assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('') }}assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('') }}assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('') }}assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('') }}assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('') }}assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('') }}assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('') }}assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    {{-- <script src="{{ asset('') }}assets/js/setting-demo2.js"></script> --}}
</body>

</html>
