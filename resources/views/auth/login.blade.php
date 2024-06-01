<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="css/responsive.css"> --}}
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
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Contraseña" required>
                            </div>
                            <div class="pt-1 mb-4">
                                <button type="submit" style="background-color: #F6A39B;"
                                    class="btn btn-info btn-lg btn-block">Iniciar Sesión</button>
                            </div>
                            <div class="form-outline mt-1">
                                <a href="{{ route('inicio') }}" class="btn btn-secondary">
                                    Regresar
                                </a>
                            </div>

                            <p>¿No tienes una cuenta? <a href="{{ route('Registrarse')}}" 
                                    class="link-info">Regístrate
                                    aquí</a>
                                    {{-- <a data-bs-toggle="modal" data-bs-target="#modalGuardar" {{ route('Registrarse')}}
                                    class="link-info">Regístrate
                                    aquí</a> --}}
                                </p>
                            @if (session('status'))
                                <div class="form-outline text-center mt-3">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="\images\login.jpg" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('Clientes.store') }}" class="max-w-sm mx-auto">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingrese su
                                Nombre</label>
                            <div class="col-12 ">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="nombre" class="mb-2 ">Contraseña</label>
                            <div class="col-12 ">
                                <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="nombre" class="mb-2 ">Telefono</label>
                            <div class="col-12 ">
                                <input type="number" max="99999999" min="10000000" class="form-control" id="Telefono"
                                    name="Telefono" required>
                            </div>
                        </div>




                        <div class="modal-footer">
                            <button type="button"
                                class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800 btn btn-secondary"
                                data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit"
                                class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Insertar-->


</body>

</html>
<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
