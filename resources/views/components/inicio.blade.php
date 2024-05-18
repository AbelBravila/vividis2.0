<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autotec Servicios</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

</head>

<style>
    a.nav-link {
        font-size: 18px;
    }

    button.nav-link {
        font-size: 18px;
    }

    a{
        text-decoration: none;
    }

    body {
        min-height: 100vh;
        /* Para que el footer quede en la parte inferior de la página */
        position: relative;
        margin-bottom: 60px;
        background-color: white;
        /* Altura del footer */
        overflow-x: clip;
    }

    footer {
        position: absolute;
        bottom: -1;
        width: 100%;
        height: 60px;
        /* Altura del footer */
        background-color: #f5f5f5;
        line-height: 60px;
    }
</style>

<body>

    <!-- Sobre Nosotros -->
    <div style="background-color: white">
        <section class="about_section pt-5">
            <div class="container">
                <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                    <div class="col-md-6">
                        <div class="text-center img-box">
                            <img src="images/about.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <h2 class="custom_heading">
                                Sobre nosotros
                                <span>
                                    Autotec Servicios
                                </span>
                            </h2>
                            <p>
                                En Autotec Servicios, nos enorgullecemos de ofrecer soluciones integrales de
                                mantenimiento vehicular respaldadas por años de experiencia en la industria automotriz.
                                Con un equipo altamente capacitado y apasionado por su trabajo, nos comprometemos a
                                proporcionar un servicio excepcional que garantice la seguridad y el rendimiento de tu
                                vehículo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

           <!-- Servicios -->
           <section class="service_section layout_padding">
            <div class="container-fluid">
                <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                    <div class="col-md-8 offset-md-2">
                        <h2 class="custom_heading" style="text-align: center;">
                            Nuestros <span>Servicios</span>
                        </h2>
                        <div class="container layout_padding2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img_box bg-secondary">
                                        <img src="images/s-1.png" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h6>
                                            Revisión y mantenimiento
                                        </h6>
                                        <p>
                                            Realizamos inspecciones exhaustivas de acuerdo con el programa de
                                            mantenimiento
                                            recomendado por el fabricante, asegurándonos de que tu vehículo esté en
                                            condiciones óptimas y listo para la carretera.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="img_box bg-secondary">
                                        <img src="images/search-icon.png" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h6>
                                            Alineación y balanceo de ruedas
                                        </h6>
                                        <p>
                                            Mejoramos la estabilidad y el manejo de tu vehículo al alinear y balancear
                                            las ruedas, asegurando un desgaste uniforme de los neumáticos y una
                                            conducción suave y segura.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="img_box bg-secondary">
                                        <img src="images/s-3.png" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h6>
                                            Servicio de transmisión y embrague
                                        </h6>
                                        <p>
                                            Mantenemos la transmisión de tu vehículo en óptimas condiciones mediante
                                            inspecciones regulares, ajustes y reparaciones, garantizando cambios de
                                            marcha suaves y eficientes en todo momento.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>

        <!-- Termina Servicios -->
       
        
        <section class="buy_section layout_padding">        
        </section>

        
        <!-- Termina Contactanos -->
        <div>
            <footer class="shadow footer">
                <div class="container">
                    <span class="text-muted">&copy; 2024 Autotec Servicios</span>
                </div>
            </footer>
</body>

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

</html>
