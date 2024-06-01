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

    <nav class="navbar navbar-expand-lg navbar-light bg-white border fixed-top pe-5 ps-5"
        style="position: relative; border-bottom-width: 1px">
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top"> --}}
        <a class="navbar-brand" href="{{route('inicio')}}">Vividi´Salon</a>

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
        </div>
    </nav>


    <header class="bg-white shadow">
        <div class="mx-auto ps-5 pt-2 pb-2 ">
            <h5 class="pt-2 ">Citas Agendadas</h2>
        </div>
    </header>

    <div class="x" style="padding-top: 50px; padding-bottom: 50px">
        <div class="ps-5 pe-5 mx-auto sm:px-20 lg:px-20">
            <div class="about_section2 ps-5 pe-5 overflow-hidden shadow-xl sm:rounded-lg"
                style="border-radius: .5rem;  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">                
                <section class="" style="height: 100%">
                    <div class="col-md-12 pe-2 ps-2">
                        <div class="row col-md-12">
                        </div>
                        <div class="col-md-12 mt-4">

                            <div class="row table-responsive">
                                <table class="table">
                                    <thead class="table-dark text-white">
                                        <tr>
                                            <th class="px-4 py-2 text-white text-center">ID</th>
                                            <th class="px-4 py-2 text-white text-center">Especialista</th>
                                            <th class="px-4 py-2 text-white text-center">Trabajo</th>
                                            <th class="px-4 py-2 text-white text-center">Horas Estimadas</th>
                                            <th class="px-4 py-2 text-white text-center">Fecha Cita</th>
                                            <th class="px-4 py-2 text-white text-center">Horario Cita</th>
                                            <th class="px-4 py-2 text-white text-center">Estado</th>
                                            <th class="px-4 py-2 text-white text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (true == (isset($Citas) ? $Citas : null))
                                            @foreach ($Citas as $cita)
                                                <tr>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->IdCita }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->NombrePersona }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->NombreTrabajo }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->TiempoEstimado }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->FechaCita }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->Horario }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->Estado }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        @if ($cita->Estado == 'Pendiente')
                                                            <div class="d-flex justify-content-center">
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#confirm-delete{{ $cita->IdCita }}"
                                                                    class="d-flex justify-content-center mt-1"
                                                                    style="height: 18px; width: 18px" href="">
                                                                    <img src="icons/check-square.svg" alt="eliminar">
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <!-- Modal Eliminar-->
                                                    <div class="modal fade" id="confirm-delete{{ $cita->IdCita }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Confirmación de Cita</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form method="POST"
                                                                        action="{{ route('ConfirmarCita', $cita->IdCita) }}"
                                                                        class="max-w-sm mx-auto">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="modal-body">
                                                                            ¿Ya ha realizado está cita?
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-default"
                                                                                data-bs-dismiss="modal">No</button>

                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-ok">Si</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal Eliminar-->

                                                </tr>
                                    </tbody>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>

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
