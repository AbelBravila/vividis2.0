@extends("LandingPage.index", ['pagina'=>'inicio'])
@section('contenido')

<header class="bg-white shadow">
    <div class="mx-auto ps-5 pt-2 pb-2 ">
        <h5 class="pt-2 ">Lista de Horarios</h2>
    </div>
</header>

    <div class="x" style="padding-top: 50px; padding-bottom: 50px">
        <div class="ps-5 pe-5 mx-auto sm:px-20 lg:px-20" >            
            <div class="about_section2 ps-5 pe-5 overflow-hidden shadow-xl sm:rounded-lg" style="border-radius: .5rem;  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;" >
            {{-- <div class="ps-5 pe-5 overflow-hidden shadow-xl sm:rounded-lg" style="border-radius: .5rem; background-color:bisque; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" > --}}
                <section class="" style="height: 100%">
                    <br>
                    <div class="col-md-12 pe-2 ps-2">
                        <div class="row col-md-12">
                            <div class="col-5 align-content-center">
                                <a data-bs-toggle="modal" data-bs-target="#modalGuardar"
                                    class="btn btn-primary col-md-5">Nuevo
                                    Registro</a>
                            </div>
                            {{-- <form class="col-7 row align-items-center" type="get" action="{{ url('/PacientesS')}}"> --}}
                            <form class="col-7 row align-items-center" type="get" action="{{ route('HorariosS') }}">
                                <div class="col-8">  
                                    <div
                                        class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <input type="search" class="form-control" name="Horario" id="Horario" placeholder="Buscar Horarios">
                                    </div>
                                    
                                </div>
                                <div class="col-4 align-content-center">
                                    <button type="submit"
                                        class="btn btn-success col-12">Buscar</button>
                                </div>
                            </form>
                           
                        </div>


                        <div class="col-md-12 mt-4">

                            <div class="row table-responsive">
                                <table class="table">
                                    <thead class="table-dark text-white">
                                        <tr>
                                            <th class="px-4 py-2 text-white text-center">ID</th>
                                            <th class="px-4 py-2 text-white text-center">Horario en Letras</th>
                                            <th class="px-4 py-2 text-white text-center">Tiempo Mañana</th>
                                            <th class="px-4 py-2 text-white text-center">Tiempo Tarde</th>                                            
                                            <th class="px-4 py-2 text-white text-center"></th>
                                            <th class="px-4 py-2 text-white text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (true == (isset($horarios) ? $horarios : null))
                                        @foreach ($horarios as $horario)
                                            <tr>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $horario->IdHorario }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $horario->Horario }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $horario->Tmanana }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $horario->Ttarde }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    <div class="d-flex justify-content-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modalEditar{{ $horario->IdHorario }}"
                                                        class="d-flex justify-content-center mt-1" style="height: 18px; width: 18px" href="">
                                                        <img src="icons/pencil-fill.svg" alt="editar" width="18"
                                                            height="18">
                                                    </a>
                                                </div>
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    <div class="d-flex justify-content-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#confirm-delete{{ $horario->IdHorario }}"
                                                        class="d-flex justify-content-center mt-1" style="height: 18px; width: 18px" href="">
                                                        <img src="icons/trash-fill.svg" alt="eliminar">
                                                    </a>
                                                </div>
                                                </td>



                                                <!-- Modal Editar-->
                                                <div class="modal fade" id="modalEditar{{ $horario->IdHorario }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Modificar
                                                                    Horario</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST"
                                                                    action="{{ route('Horarios.update', $horario->IdHorario) }}"
                                                                    class="max-w-sm mx-auto">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horario en Letras</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <input type="text" class="form-control" id="Horario" name="Horario" value="{{$horario->Horario}}" required>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo Mañana</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <input type="number" min="0" max="8" class="form-control" id="Tmanana" name="Tmanana" value="{{$horario->Tmanana}}" required>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo Tarde</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <input type="number" min="0" max="8" class="form-control" id="Ttarde" name="Ttarde" value="{{$horario->Ttarde}}" required>
                                                                        </div>
                                                                    </div>                       
                                        
                                                                    <input type="hidden" class="form-control" id="Estado" name="Estado"
                                                                        value="Activo" value="{{$horario->Estado}}" required>

                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800 btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                                                                            Cambios</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Editar-->


                                                <!-- Modal Eliminar-->

                                                <div class="modal fade"
                                                    id="confirm-delete{{ $horario->IdHorario }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Eliminar
                                                                    Paciente</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST"
                                                                    action="{{ route('Horarios.destroy', $horario->IdHorario) }}"
                                                                    class="max-w-sm mx-auto">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <div class="modal-body">
                                                                        ¿Desea eliminar este registro?
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-bs-dismiss="modal">Cancelar</button>

                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-ok">Borrar</button>
                                                                        {{-- <a type="submit" class="btn btn-danger btn-ok">Borrar</a> --}}
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
        <!-- Modal Insertar-->
        <div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Paciente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('Horarios.store') }}" class="max-w-sm mx-auto">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horario en Letras</label>
                                <div
                                    class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <input type="text" class="form-control" id="Horario" name="Horario" required>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo Mañana</label>
                                <div
                                    class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <input type="number" min="0" max="8" class="form-control" id="Tmanana" name="Tmanana" required>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo Tarde</label>
                                <div
                                    class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <input type="number" min="0" max="8" class="form-control" id="Ttarde" name="Ttarde" required>
                                </div>
                            </div>                       

                            <input type="hidden" class="form-control" id="Estado" name="Estado"
                                value="Activo" required>

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

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @endsection
