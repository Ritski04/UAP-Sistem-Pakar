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
                            <form action="{{ route('auth.login.process') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Email/Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Email/username" value="{{ old('username') }}" />
                                    
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">Masuk</button>
                                </div>
                            </form>
                            <p>Belum punya akun? <a href="{{ route('auth.daftar') }}">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>

</html>
