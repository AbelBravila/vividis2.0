<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vividi´Salon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white border fixed-top pe-5 ps-5" style="position: relative; border-bottom-width: 1px" >
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white border shadow fixed-top pe-5 ps-5" style="position: relative" > --}}
        <a class="navbar-brand" href="{{ route('inicioL') }}">Vividi´Salon</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: space-between">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicioL') }}" style="color:black;">Inicio</a>
                </li>

                @if (Auth::user()->rol == 'Administrador')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios') }}" style="color:black;">Usuarios</a>
                </li>
                @endif 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Personal.index') }}" style="color:black;">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Trabajos.index') }}" style="color:black;">Trabajos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Especialidades.index') }}" style="color:black;">Especialidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Horarios.index') }}" style="color:black;">Horarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Horarios.index') }}" style="color:black;">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicioL') }}" style="color:black;">Citas</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item pe-2">
                    <a href="{{ route('Agendar.index') }}" class="btn border border-secondary btn-transparent ">Agenda tu Cita</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('CerrarSesion') }}" class="btn border border-danger btn-danger ">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('contenido')
    </main>

</body>


</html>

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>