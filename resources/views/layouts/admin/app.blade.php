<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
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
                urls: ["{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"],
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
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.min.css') }}" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            {{-- header --}}
            @include('layouts.admin.header')
            {{-- end header --}}

            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">@yield('pagetitle')</h3>
                            <hr>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>

            {{-- footer --}}
            @include('layouts.admin.footer')
            {{-- end footer --}}
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

    <!-- Sweet Alert -->
    <script src="{{ asset('') }}assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('') }}assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('') }}assets/js/setting-demo.js"></script>
    {{-- <script src="{{ asset('') }}assets/js/demo.js"></script> --}}
    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#basic-datatables").DataTable({});

            $("#multi-filter-select").DataTable({
                pageLength: 10,
                initComplete: function () {
                    this.api()
                        .columns()
                        .every(function () {
                            var column = this;
                            var select = $(
                                    '<select class="form-select"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on("change", function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this)
                                        .val());

                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append(
                                        '<option value="' + d + '">' + d + "</option>"
                                    );
                                });
                        });
                },
            });
        });
    </script>
    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">My Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs -->
                    <ul class="nav nav-line nav-tabs-bordered" id="profileTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="view-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#view-profile" type="button" role="tab" aria-controls="view-profile"
                                aria-selected="true">View Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile"
                                aria-selected="false">Edit Profile</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="profileTabContent">
                        <div class="tab-pane fade show active" id="view-profile" role="tabpanel"
                            aria-labelledby="view-profile-tab">
                            <!-- View Profile Content -->
                            <h5 class="mt-3">Profile Information</h5>
                            <hr>
                            <div class="row p-3">
                                <div class="col-md-2">
                                    <p><strong>Name</strong></p>
                                    <p><strong>Alamat</strong></p>
                                    <p><strong>TTL</strong></p>
                                    <p><strong>Gender</strong></p>
                                    <p><strong>Email</strong></p>
                                    <p><strong>Username</strong></p>
                                    <p><strong>No HP</strong></p>
                                </div>
                                <div class="col-md-1">
                                    <p class="col-md-1">:</p>
                                    <p class="col-md-1">:</p>
                                    <p class="col-md-1">:</p>
                                    <p class="col-md-1">:</p>
                                    <p class="col-md-1">:</p>
                                    <p class="col-md-1">:</p>
                                    <p class="col-md-1">:</p>
                                </div>
                                <div class="col-md">
                                    <p class="col-md"> {{ Auth::user()->nama }}</p>
                                    <p class="col-md"> {{ Auth::user()->alamat }}</p>
                                    <p class="col-md">
                                        {{ Auth::user()->tempat_lahir }}/{{ Auth::user()->tanggal_lahir }}</p>
                                    <p class="col-md"> {{ Auth::user()->gender }}</p>
                                    <p class="col-md"> {{ Auth::user()->email }}</p>
                                    <p class="col-md"> {{ Auth::user()->username }}</p>
                                    <p class="col-md"> {{ Auth::user()->hp }}</p>
                                </div>
                                <!-- Add other profile information here -->
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                aria-label="Close">Close</button>
                        </div>
                        <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                            <!-- Edit Profile Form -->
                            <div class="p-3">
                                <h5>Edit Profile</h5>
                                <hr>
                                <form class="row g-3" method="POST"
                                    action="{{ route('admin.profile',Auth::user()->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-6">
                                        <label for="yourName" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="yourName"
                                            value="{{ old('nama',Auth::user()->nama) }}" required>
                                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                                    </div>

                                    <div class="col-6">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="3"
                                            class="form-control">{{ old('alamat',Auth::user()->alamat) }}</textarea>
                                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                                    </div>
                                    <div class="col-6">
                                        <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                            value="{{ old('tempat_lahir',Auth::user()->tempat_lahir) }}" required>
                                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                                    </div>
                                    <div class="col-6">
                                        <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                            value="{{ old('tanggal_lahir',Auth::user()->tanggal_lahir) }}" required>
                                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                                    </div>
                                    <div class="col-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <option value="Laki-laki"
                                                {{ Auth::user()->gender == "Laki-laki" ? "selected" : "" }}>Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ Auth::user()->gender == "Perempuan" ? "selected" : "" }}>Perempuan
                                            </option>
                                        </select>
                                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                                    </div>
                                    <div class="col-6">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp"
                                            value="{{ old('no_hp',Auth::user()->hp) }}" required>
                                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                                    </div>

                                    <div class="col-6">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail"
                                            value="{{ old('email',Auth::user()->email) }}" required>
                                        {{-- <div class="invalid-feedback">Please enter a valid Email adddress!</div> --}}
                                    </div>

                                    <div class="col-6">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group">
                                            {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                value="{{ old('username',Auth::user()->username) }}" required>
                                            {{-- <div class="invalid-feedback">Please choose a username.</div> --}}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Tabs -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
