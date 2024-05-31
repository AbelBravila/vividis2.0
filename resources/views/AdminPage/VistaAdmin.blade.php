<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vividi´Salon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  -->
</head>

<body>
<input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>Vividi<span>´Salon</span></h3>
        </div>

        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url('{{ asset('images/papa.jpg') }}')"></div>
                <h4>{{ Auth::user()->name }}</h4>
                <small>{{ Auth::user()->rol }}</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li><a href="{{ route('vistaAdmin') }}" class="active"><span class="las la-home"></span><small>Inicio</small></a></li>
                    @if (Auth::user()->rol == 'Administrador')
                        <li><a href="{{ route('usuarios') }}"><span class="las la-user-alt"></span><small>Usuarios</small></a></li>
                    @endif
                    <li><a href="{{ route('Trabajos.index') }}"><span class="las la-cut"></span><small>Trabajos</small></a></li>
                    <li><a href="{{ route('Especialidades.index') }}"><span class="las la-gem"></span><small>Especialidades</small></a></li>
                    <li><a href="{{ route('Horarios.index') }}"><span class="las la-clock"></span><small>Horarios</small></a></li>
                    <li><a href=""><span class="las la-user-check"></span><small>Clientes</small></a></li>
                    <li><a href=""><span class="las la-calendar-check"></span><small>Citas</small></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle"><span class="las la-bars"></span></label>

                <div class="header-menu">
                    <label for=""><span class="las la-search"></span></label>

                    <div class="notify-icon"><span class="las la-envelope"></span><span class="notify">4</span></div>
                    <div class="notify-icon"><span class="las la-bell"></span><span class="notify">3</span></div>

                    <div class="user">
                        <div class="bg-img" style="background-image: url('{{ asset('images/papa.jpg') }}')"></div>
                        <span class="las la-power-off"></span><a href="{{ route('CerrarSesion') }}">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="page-header">
                <h1>@yield('page-title', 'Dashboard')</h1>
                <small>@yield('breadcrumb', 'Home / Dashboard')</small>
            </div>

            <div class="page-content">
                @yield('contenido')
            </div>
        </main>
    </div>

    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>