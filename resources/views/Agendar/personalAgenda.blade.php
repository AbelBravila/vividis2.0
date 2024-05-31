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
                    <a class="nav-link" href="{{route('inicio')}}" style="color:black;">Inicio</a>
                </li>
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Citas.index')}}" style="color:black;">Citas Agendadas</a>
                </li>
                @endif

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('Agendar.index') }}" class="btn border border-secondary btn-transparent ml-xl-4">Agenda tu Cita</a>
                </li>
            
                @if (Auth::check())
                <li class="nav-item">
                    <a href="{{ route('CerrarSesion') }}" class="btn border border-danger btn-danger ml-xl-4">Cerrar Sesión</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('IniciaSesion') }}" class="btn border border-secondary btn-secondary ml-xl-4">Iniciar Sesión</a>
                </li>
                @endif            
            </ul>
        </div>
    </nav>

    <!-- Sobre Nosotros -->
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
                                <div>
                                    <h2 class="custom_heading">
                                        Personal Disponible
                                        <span>
                                            {{ $PersonalDisponible[0]->NombreTrabajo }}
                                        </span>
                                    </h2>
                                </div>
                            </div>
                            <div class="">
                                <a href="{{ route('Agendar.index') }}"
                                    class="btn border border-secondary btn-transparent ">Regresar</a>
                            </div>
                        </div>

                        @foreach ($PersonalDisponible as $personal)                        
                            {{-- <a data-bs-toggle="modal" data-bs-target="#modalGuardar{{ $personal->IdPersonal }}"
                                class="btn border m-2 border-secondary btn-transparent ml-xl-4">{{ $personal->NombrePersona }}</a> --}}
                                <a  href="{{ route('AgendarCita', ['id' => $personal->IdPersonal, 'idTrabajo' => $Trabajos[0]->IdTrabajo]) }}"
                                    class="btn border m-2 border-secondary btn-transparent ml-xl-4">{{ $personal->NombrePersona }}</a>

                            <div id="datos-container">
                                <!-- Aquí se mostrarán los datos -->
                            </div>

                            <script>
                                fetch('FechasDisponibles' + {{ $personal->IdPersonal }})
                                    .then(response => response.json())
                                    .then(data => {
                                        // Manipula los datos como desees
                                        // Por ejemplo, mostrarlos en el contenedor de datos
                                        const datosContainer = document.getElementById('prueba' + {{ $personal->IdPersonal }});
                                        // datosContainer.innerHTML = `<p>${firstDato.nombre}: ${firstDato.valor}</p>`;
                                        data.forEach(dato => {
                                            datosContainer.innerHTML += `<button type="button" onclick="MananaTardeDisponible('${dato.FechaCita}', ${dato.TiempoManana}, ${dato.TiempoTarde}, ${dato.TmananaRestante}, ${dato.TtardeRestante})" class="col-3 m-3 text-white btn btn-secondary">${dato.FechaCita}</button>
                            <div class="form-group mb-2" id="fechasdisponibles${dato.FechaCita}" style="display: none;">
                                <div class="col-12">
                                    <button class="col-4 btn btn-info">Agendar en la mañana</button>
                                    <button class="col-4 btn btn-info">Agendar en la Tarde</button>
                                </div>
                            </div>`;
                                        });

                                    })
                                    .catch(error => {
                                        console.error('Error al obtener los datos:', error);
                                    });
                            </script>                            
                            <!-- Modal Insertar-->
                            <div class="modal fade" id="modalGuardar{{ $personal->IdPersonal }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Fechas Disponibles</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            {{-- <form method="POST" action="{{ route('Horarios.store') }}" class="max-w-sm mx-auto"> --}}
                                            <form method="POST" class="max-w-sm mx-auto">
                                                @csrf

                                                <div id="prueba{{ $personal->IdPersonal }}">
                                                </div>


                                                {{-- <div class="modal-footer">
                                                    <button type="button"
                                                        class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800 btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit"
                                                        class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                                                </div> --}}
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Modal Insertar-->
                        @endforeach
                    </div>
                </div>
            </div>

            <section class="layout_padding">

            </section>
        </section>




        <div>

            <footer class="shadow footer">
                <div class="container">
                    <span class="text-muted">&copy; 2024 Vividi´Salon</span>
                </div>
            </footer>



</body>
<script>
    function MananaTardeDisponible(fechaCita, TiempoManana, TiempoTarde, TmananaRestante, TtardeRestante) {

        if (TmananaRestante = 0) {

        }
        var rolSelect = document.getElementById('rol' + fechaCita);
        var selectEmpleado = document.getElementById('fechasdisponibles' + fechaCita);
        if (selectEmpleado) { // Verificar si selectEmpleado no es null
            if (selectEmpleado.style.display == 'none') { // Usar == para comparación
                selectEmpleado.style.display = 'block';
            } else {
                selectEmpleado.style.display = 'none';
            }
        } else {
            console.error('No se encontró ningún elemento con el ID: ' + 'fechasdisponibles' + fechaCita);
        }
    }
</script>

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</html>
