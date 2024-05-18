<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Pacientes con Problemas Mentales</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/style.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<style>
    a.nav-link {
        font-size: 18px;
    }

    button.nav-link {
        font-size: 18px;
    }

    body {
        min-height: 100vh;
        /* Para que el footer quede en la parte inferior de la página */
        position: relative;
        margin-bottom: 60px;
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
    <div>
        <section class="about_section layout_padding">
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
                                    Clínica Serenidad Mental
                                </span>
                            </h2>
                            <p>
                                En Clínica Serenidad Mental, nos dedicamos al cuidado integral de la salud
                                mental con un enfoque personalizado y ético. Creemos en la esperanza y la
                                recuperación, acompañando a nuestros pacientes hacia una vida más plena y
                                saludable.
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
                                    <div class="img_box">
                                        <img src="images/s-1.png" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h6>
                                            Evaluación y diagnóstico
                                        </h6>
                                        <p>
                                            Realizamos evaluaciones exhaustivas
                                            para comprender las necesidades
                                            individuales de cada paciente y
                                            proporcionar un diagnóstico preciso que
                                            guíe el plan de tratamiento.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="img_box">
                                        <img src="images/search-icon.png" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h6>
                                            Terapia individual
                                        </h6>
                                        <p>
                                            Ofrecemos terapia individualizada dirigida por terapeutas altamente
                                            capacitados que
                                            trabajan en colaboración con los pacientes para abordar sus desafíos
                                            específicos y
                                            promover el crecimiento personal.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="img_box">
                                        <img src="images/s-3.png" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h6>
                                            Psiquiatría
                                        </h6>
                                        <p>
                                            Contamos con psiquiatras expertos que brindan evaluación, diagnóstico y
                                            tratamiento
                                            farmacológico para una variedad de trastornos mentales.
                                            Resume esos tres


                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>

        <!-- Termina Servicios -->



        <!-- Galeria -->
        <section class="gallery-section" style="padding: 20px;">
            <div class="container">
                <h2>
                    Nuestra Galeria
                </h2>
            </div>
            <div class="container">
                <div class="img_box box-1">
                    <img src="images/client9.jpg" alt="">
                </div>
                <div class="img_box box-2">
                    <img src="images/client10.jpg" alt="">
                </div>
                <div class="img_box box-3">
                    <img src="images/client8.jpg" alt="">
                </div>
                <div class="img_box box-4">
                    <img src="images/client2.jpg" alt="">
                </div>
                <div class="img_box box-5">
                    <img src="images/client5.jpg" alt="">
                </div>
            </div>

        </section>
        <!-- Galeria -->





        <section class="buy_section layout_padding">
            <!-- <div class="container">
        <h2>
            You Can Buy Pet From Our Clinic
        </h2>
        <p>
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        </p>
        <div class="d-flex justify-content-center">
            <a href="">
                Buy Now
            </a>
        </div>
    </div> -->
        </section>

        <!-- Testimonios -->
        <section class="client_section layout_padding-bottom">
            <div class="container">
                <h2 class="custom_heading text-center">
                    Lo que dicen nuestros
                    <span>
                        Clientes
                    </span>
                </h2>
                <p class="text-center">
                    Algunos testimonios de clientes que han acudido a Clínica Serenidad Mental
                </p>
                <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="layout_padding2 pl-100">
                                <div class="client_container ">
                                    <div class="img_box">
                                        <img src="images/client4.jpg" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h5>
                                            Javier M.
                                        </h5>
                                        <p>
                                            La experiencia en Clínica Serenidad Mental ha sido transformadora. Después
                                            de años
                                            de luchar con mi salud mental, finalmente encontré un lugar donde me siento
                                            escuchado y comprendido. La terapia personalizada y el apoyo continuo me han
                                            permitido recuperar mi bienestar y recuperar el control de mi vida
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="layout_padding2 pl-100">
                                <div class="client_container ">
                                    <div class="img_box">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h5>
                                            Marta R.
                                        </h5>
                                        <p>
                                            Recomendaría Clínica Serenidad Mental a cualquiera que esté buscando ayuda
                                            con sus
                                            problemas de salud mental. El equipo aquí no solo tiene un profundo
                                            conocimiento de
                                            su campo, sino que también son personas genuinas que se preocupan por el
                                            bienestar
                                            de sus pacientes. Estoy muy agradecida por haber encontrado este lugar
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="layout_padding2 pl-100">
                                <div class="client_container ">
                                    <div class="img_box">
                                        <img src="images/client3.jpg" alt="">
                                    </div>
                                    <div class="detail_box">
                                        <h5>
                                            Ana S.
                                        </h5>
                                        <p>
                                            La Clínica Serenidad Mental ha sido un verdadero salvavidas para mí. Desde
                                            el primer
                                            día, sentí que estaba en buenas manos. El equipo de profesionales es
                                            excepcionalmente compasivo y atento a mis necesidades. Gracias a su ayuda,
                                            he
                                            logrado hacer grandes avances en mi recuperación mental
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </section>
        <!-- Termina Testimonios -->

        <!-- Contactanos -->

        <section class="map_section">
            <div class="d-flex justify-content-center align-items-center h-100">


                <div class="form_container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">
                            <form action="">
                                <div class="text-center">
                                    <h3>Contáctanos</h3>
                                </div>
                                <div>
                                    <input type="text" placeholder="Nombre" class="pt-3">
                                </div>
                                <div>
                                    <input type="number" placeholder="Número de Telefono">
                                </div>
                                <div>
                                    <input type="email" placeholder="Correo">
                                </div>
                                <div>
                                    <input type="text" placeholder="Mensaje">
                                </div>
                                <div>
                                    <button>Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Termina Contactanos -->
        <div>
            <footer class="shadow footer">
                <div class="container">
                    <span class="text-muted">&copy; 2024 Control de Pacientes</span>
                </div>
            </footer>
</body>

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

</html>