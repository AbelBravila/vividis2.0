<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vividi´Salon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top">
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top"> --}}
        <a class="navbar-brand" href="{{ route('inicio') }}">Vividi´Salon</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: space-between">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}" style="color:black;">Inicio</a>
                </li>
                @if (Auth::check())

                    @if (Auth::user()->rol == 'Cliente')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Citas.index') }}" style="color:black;">Citas
                                Agendadas</a>
                        </li>
                    @endif

                    @if (Auth::user()->rol == 'Empleado')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('CitasEmpleado') }}" style="color:black;">Registro de
                                Citas</a>
                        </li>
                    @endif

                @endif

            </ul>

            <ul class="navbar-nav">



                
                @if (Auth::check())
                    @if (Auth::user()->rol != 'Empleado')
                        <li class="nav-item">
                            <a href="{{ route('Agendar.index') }}"
                                class="btn border border-secondary btn-transparent ml-xl-4">Agenda tu Cita</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{ route('Agendar.index') }}"
                            class="btn border border-secondary btn-transparent ml-xl-4">Agenda tu Cita</a>
                    </li>
                @endif



                @if (Auth::check())
                    <li class="nav-item">
                        <a href="{{ route('CerrarSesion') }}" class="btn border border-danger btn-danger ml-xl-4">Cerrar
                            Sesión</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('IniciaSesion') }}"
                            class="btn border border-secondary btn-secondary ml-xl-4">Iniciar Sesión</a>
                    </li>
                @endif
            </ul>

            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('IniciaSesion') }}" class="btn border btn-secondary ml-xl-4">Iniciar Sesión</a>
                </li>
            </ul> --}}

            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#contactanos">Agenda tu Cita</a>
                </li>
            </ul> --}}
        </div>
    </nav>

    <div id="inicio">
        <section class="about_section layout_padding" style="height: 100vh">
            <div class="container">
                <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                    {{-- <div class="col-md-6">
                        <div class="text-center img-box">
                            <img src="images/hair-salon-tools-beauty-watercolor-floral-png.png" alt="">
                        </div>
                    </div> --}}
                    <div class="col-md-12" style="display: flex; flex-direction: column;">
                        <div class="col-12" style="justify-content: space-between; display:flex;">
                            <div>
                                <h2 class="custom_heading">
                                    Agendar Cita para
                                    <span>
                                        {{ $Trabajos[0]->NombreTrabajo }}
                                    </span>
                                    con
                                    <span>
                                        {{ $PersonalDisponible[0]->NombrePersona }}
                                    </span>
                                    {{-- Tiempo Estimado
                                        <span>
                                            {{ $PersonalDisponible[0]->TiempoEstimado }} Hora
                                        </span> --}}
                                </h2>
                            </div>
                            <div class="">
                                <a href="{{ route('Agendar.index') }}"
                                    class="btn border border-secondary btn-transparent ">Regresar</a>
                            </div>
                        </div>
                        <br>
                        <div class="border border-radius" style="text-align: center">

                            <h2 class="mt-3">Fechas Disponibles</h2>
                            <div class=""
                                style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
                                @foreach ($fechasDisponibles as $fechaDisponible)
                                    <a data-bs-toggle="modal"
                                        data-bs-target="#modalEditar{{ $fechaDisponible->FechaCita }}"
                                        class="col-3 m-3 text-white btn btn-secondary">{{ $fechaDisponible->FechaCita }}</a>



                                    <div class="modal fade" id="modalEditar{{ $fechaDisponible->FechaCita }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Seleccione un horario para su Cita</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <h5 class="pb-4 pt-4">Fecha {{ $fechaDisponible->FechaCita }}</h5>


                                                    <div class="col-12" style="display: flex">
                                                        <div class="col-6">
                                                            <form method="POST" action="{{ route('Agendar.store') }}">
                                                                @csrf
                                                                @if ($PersonalDisponible[0]->TiempoEstimado > $fechaDisponible->TmananaRestante - $fechaDisponible->TiempoManana)
                                                                    <div class="col-12 form-group pe-2 ps-2">
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <button
                                                                                class="btn btn-block btn-info disabled border-secondary">Mañana</button>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12 form-group pe-2 ps-2">
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <button
                                                                                class="btn btn-block btn-info ">Mañana</button>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                <input type="hidden" class="form-control"
                                                                    id="IdPersonal" name="IdPersonal"
                                                                    value="{{ $PersonalDisponible[0]->IdPersonal }}"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="IdTrabajo" name="IdTrabajo"
                                                                    value="{{ $Trabajos[0]->IdTrabajo }}" required>

                                                                <input type="hidden" class="form-control"
                                                                    id="FechaCita" name="FechaCita"
                                                                    value="{{ $fechaDisponible->FechaCita }}"
                                                                    required>


                                                                <input type="hidden" class="form-control"
                                                                    id="Tmanana" name="Tmanana"
                                                                    value="{{ $Trabajos[0]->TiempoEstimado }}"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Ttarde" name="Ttarde" value="0"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="IdCliente" name="IdCliente"
                                                                    value="{{ Auth::user()->id }}" required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Cliente" name="Cliente"
                                                                    value="{{ Auth::user()->name }}" required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Estado" name="Estado" value="Pendiente"
                                                                    required>
                                                            </form>

                                                        </div>
                                                        <div class="col-6">
                                                            <form method="POST"
                                                                action="{{ route('Agendar.store') }}">
                                                                @csrf
                                                                @if ($PersonalDisponible[0]->TiempoEstimado > $fechaDisponible->TtardeRestante - $fechaDisponible->TiempoTarde)
                                                                    <div class="col-12 form-group pe-2 ps-2">
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <button
                                                                                class="btn btn-block btn-primary disabled">Tarde</button>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12 form-group pe-2 ps-2">
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <button
                                                                                class="btn btn-block btn-primary ">Tarde</button>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                <input type="hidden" class="form-control"
                                                                    id="IdTrabajo" name="IdTrabajo"
                                                                    value="{{ $Trabajos[0]->IdTrabajo }}" required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Ttarde" name="Ttarde"
                                                                    value="{{ $Trabajos[0]->TiempoEstimado }}"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Tmanana" name="Tmanana" value="0"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="FechaCita" name="FechaCita"
                                                                    value="{{ $fechaDisponible->FechaCita }}"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="IdCliente" name="IdPersonal"
                                                                    value="{{ $PersonalDisponible[0]->IdPersonal }}"
                                                                    required>

                                                                <input type="hidden" class="form-control"
                                                                    id="IdCliente" name="IdCliente"
                                                                    value="{{ Auth::user()->id }}" required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Cliente" name="Cliente"
                                                                    value="{{ Auth::user()->name }}" required>

                                                                <input type="hidden" class="form-control"
                                                                    id="Estado" name="Estado" value="Pendiente"
                                                                    required>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


</body>
<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
