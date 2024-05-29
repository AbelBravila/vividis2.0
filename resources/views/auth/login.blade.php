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
</body>
</html>
