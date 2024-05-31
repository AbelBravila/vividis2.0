@extends('LandingPage.index', ['pagina' => 'inicio'])
@section('contenido')


    <header class="bg-white shadow">

        <div class="header-content">
            <div class="header-menu">
                <label class="pt-2" for="menu-toggle"><span class="las la-bars"></span></label>
                <div class="mx-auto  pt-2 pb-2 ">
                    <h5 class="pt-1 ">Lista de Citas Agendadas</h2>
                </div>
            </div>
            <div class="user">
                <div class="bg-img" style="background-image: url('{{ asset('images/papa.jpg') }}')"></div>
                <span class="las la-power-off"></span><a href="{{ route('CerrarSesion') }}">Cerrar Sesión</a>
            </div>
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
                                            <th class="px-4 py-2 text-white text-center">Cliente</th>
                                            <th class="px-4 py-2 text-white text-center">Telefono Cliente</th>
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
                                                        {{ $cita->name }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->Telefono }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $cita->Estado }}</td>
                                                    <td class="border px-4 py-2 text-center">
                                                        @if ($cita->Estado == 'Pendiente')
                                                            <div class="d-flex justify-content-center">
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#confirm-delete{{ $cita->IdCita }}"
                                                                    class="d-flex justify-content-center mt-1"
                                                                    style="height: 18px; width: 18px" href="">
                                                                    <img src="icons/trash-fill.svg" alt="eliminar">
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
                                                                        Cancelar Cita</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form method="POST"
                                                                        action="{{ route('Citas.destroy', $cita->IdCita) }}"
                                                                        class="max-w-sm mx-auto">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <div class="modal-body">
                                                                            ¿Desea cancelar esta cita?
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default"
                                                                                data-bs-dismiss="modal">Regresar</button>

                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-ok">Cancelar</button>
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
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
