<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-Tracer</title>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <style>
        .form-control:focus {
            border-color: #FF3333 !important;
            box-shadow: 0 0 0 0.2rem rgba(248, 36, 36, 0.25);
        }
    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {{-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> --}}
                    <h1 class="auth-title fw-bold" style="color: #FF3333">Log in.</h1>
                    <p class="auth-subtitle mb-5">Silahkan masukkan email dan password anda </p>

                    <form action="{{ route('login.process') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control border-active form-control-xl" name="email"
                                placeholder="Email">
                            <div class="form-control-icon">
                                <i class="fa fa-at"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
                        <button class="btn btn-block btn-lg shadow-lg mt-5"
                            style="background-color: #FF3333; color:white">Log in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" >
                    {{-- <img src="{{ asset('images/gambar_puskesmas.jpg') }}"> --}}
                </div>
            </div>
        </div>

    </div>
</body>

</html>
