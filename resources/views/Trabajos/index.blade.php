@extends("LandingPage.index", ['pagina'=>'inicio'])
@section('contenido')

<header class="bg-white shadow">
    
    <div class="header-content">
        <div class="header-menu">
        <label class="pt-2" for="menu-toggle"><span class="las la-bars"></span></label>        
        <div class="mx-auto  pt-2 pb-2 ">
            <h5 class="pt-1 ">Lista de Trabajos</h2>
        </div> 
        </div>
        <div class="user">
            <div class="bg-img" style="background-image: url('{{ asset('images/papa.jpg') }}')"></div>
            <span class="las la-power-off"></span><a href="{{ route('CerrarSesion') }}">Cerrar Sesión</a>
        </div>
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
                            <form class="col-7 row align-items-center" type="get" action="{{ route('TrabajosS') }}">
                                <div class="col-8">  
                                    <div
                                        class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <input type="search" class="form-control" name="NombreTrabajo" id="NombreTrabajo" placeholder="Buscar Trabajo">
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
                                            <th class="px-4 py-2 text-white text-center">Nombre Trabajo</th>
                                            <th class="px-4 py-2 text-white text-center">Tiempo Estimado</th>                                                                                      
                                            <th class="px-4 py-2 text-white text-center"></th>
                                            <th class="px-4 py-2 text-white text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (true == (isset($trabajos) ? $trabajos : null))
                                        @foreach ($trabajos as $trabajo)
                                            <tr>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $trabajo->IdTrabajo }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $trabajo->NombreTrabajo }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $trabajo->TiempoEstimado }}</td>                                              
                                                <td class="border px-4 py-2 text-center">
                                                    <div class="d-flex justify-content-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modalEditar{{ $trabajo->IdTrabajo }}"
                                                        class="d-flex justify-content-center mt-1" style="height: 18px; width: 18px" href="">
                                                        <img src="icons/pencil-fill.svg" alt="editar" width="18"
                                                            height="18">
                                                    </a>
                                                </div>
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    <div class="d-flex justify-content-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#confirm-delete{{ $trabajo->IdTrabajo }}"
                                                        class="d-flex justify-content-center mt-1" style="height: 18px; width: 18px" href="">
                                                        <img src="icons/trash-fill.svg" alt="eliminar">
                                                    </a>
                                                </div>
                                                </td>



                                                <!-- Modal Editar-->
                                                <div class="modal fade" id="modalEditar{{ $trabajo->IdTrabajo }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Modificar Trabajo</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST"
                                                                    action="{{ route('Trabajos.update', $trabajo->IdTrabajo) }}"
                                                                    class="max-w-sm mx-auto">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Trabajo</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <input type="text" class="form-control" id="NombreTrabajo" name="NombreTrabajo" value="{{$trabajo->NombreTrabajo}}" required>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo Estimado</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <input type="number" min="0" max="8" class="form-control" id="TiempoEstimado" name="TiempoEstimado" value="{{$trabajo->TiempoEstimado}}" required>
                                                                        </div>
                                                                    </div>                                        
                                                                                     
                                        
                                                                    <input type="hidden" class="form-control" id="Estado" name="Estado"
                                                                        value="Activo" value="{{$trabajo->Estado}}" required>

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
                                                    id="confirm-delete{{ $trabajo->IdTrabajo }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Eliminar Registro</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST"
                                                                    action="{{ route('Trabajos.destroy', $trabajo->IdTrabajo) }}"
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
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Trabajo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('Trabajos.store') }}" class="max-w-sm mx-auto">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Trabajo</label>
                                <div
                                    class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <input type="text" class="form-control" id="NombreTrabajo" name="NombreTrabajo" required>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo Estimado</label>
                                <div
                                    class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <input type="number" min="0" max="8" class="form-control" id="TiempoEstimado" name="TiempoEstimado" required>
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
