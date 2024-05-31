<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="css/responsive.css">--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 

    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/foodhut.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <title>Login</title>
</head>

<body>
<style>
    .bg-image-vertical {
position: relative;
overflow: hidden;
background-repeat: no-repeat;
background-position: right center;
background-size: auto 100%;
}
@media (min-width: 1025px) {
.h-custom-2 {
height: 100%;
}
}
</style>

<header class="vh-100 header" style="max-height: 100%">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <form method="POST" action="{{ route('sesion') }}" style="width: 23rem;">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicio de sesión</h3>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input class="form-control form-control-lg" type="user" id="name" name="name"
                                placeholder="Usuario" required>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                placeholder="Contraseña" required>
                        </div>
                        <div class="pt-1 mb-4">
                            <button type="submit" style="background-color: #F6A39B;"  class="btn btn-info btn-lg btn-block">Iniciar Sesión</button>
                        </div>
                        <div class="form-outline mt-1">
                            <a href="/inicio" class="btn btn-secondary">
                              Regresar
                            </a>
                          </div>

                        <p>¿No tienes una cuenta? <a href="#!" class="link-info">Regístrate aquí</a></p>
                        @if (session('status'))
                            <div class="form-outline text-center mt-3">
                                {{ session('status') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="\images\login.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</header>

<!--
    <header class="vh-100 header" style="max-height: 100%">
        <div class="overlay2 col-12 container py-5 d-flex justify-content-center align-items-center h-100">

            {{-- <div class="layout_padding row d-flex justify-content-center align-items-center border"
                style="font-family: Poppins; background: white; width: 100%; padding-bottom: 50px; font-size: 18px; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px"> --}}
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center text white">Inicio de sesión</h3>
                            <form method="POST" action="{{ route('sesion') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="user" id="name" name="name"
                                        placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Contraseña" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-outline mt-1">
                                        <a href="/inicio" class="btn btn-secondary">
                                            Regresar
                                        </a>
                                    </div>
                                    <div class="form-outline mt-1">
                                        <button type="submit" class="btn btn-primary">
                                            Iniciar Sesión
                                        </button>
                                    </div>
                                </div>

                                @if (session('status'))
                                    <div class="form-outline text-center mt-3">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
-->
</body>
</html>
