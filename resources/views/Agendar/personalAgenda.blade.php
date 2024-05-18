<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vividi´Salon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" >
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top"> --}}
        <a class="navbar-brand" href="/">Vividi´Salon</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: space-between">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('Agendar.index') }}" class="btn border border-secondary btn-transparent ml-xl-4">Agenda tu Cita</a>
                </li>
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
                        <div class="detail-box">
                            <h2 class="custom_heading">
                                Personal Disponible
                                <span>
                                    {{$PersonalDisponible[0]->NombreTrabajo}}
                                </span>
                            </h2>                         
                        </div>
                        @foreach ($PersonalDisponible as $personal)
                        <a href="" class="btn border m-2 border-secondary btn-transparent ml-xl-4">{{$personal->NombrePersona}}</a>
                        {{-- <button class="btn border border-secondary btn-transparent ml-xl-4"></button>                                                         --}}
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

</html>

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
