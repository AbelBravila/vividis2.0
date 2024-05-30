@extends("LandingPage.index", ['pagina'=>'inicio'])
@section('contenido')

<!--inicio Section Start-->
<section id="inicio" class="section">
    <div id="banner" >
  <img src="images\banner.jpg" alt="banner" style="width:100%;">
</div>
  </section>
  <!--inicio Section End-->
<!-- Sobre Nosotros -->
<div id="inicio">
    <section class="about_section layout_padding">
        <div class="container">
            <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                <div class="col-md-6">
                    <div class="text-center img-box">
                        <img src="images/PERSONAL.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-5">
                    <div class="detail-box">
                        <h2 class="custom_heading">
                            Sobre nosotros
                            <span style="color: pink;">
                                Vividi´Salon
                            </span>
                        </h2>
                        <p>                               

                        <p>Fundada en 2020, Vividi´Salon ya es destaque en la ciudad y conquista nuevos
                            clientes diariamente.</p>

                        <p>Ofrecemos profesionales experimentados que están constantemente observando los cambios y
                            movimiento en el mundo de la moda, para así ofrecer a nuestros clientes las últimas
                            tendencias. El atendimiento posee un padrón de excelencia y agilidad, garantizando
                            calidad y satisfacción de nuestros clientes.</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section class="service_section layout_padding2">
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
                                    <img src="images/tinte-para-el-cabello.png" alt="">
                                </div>
                                <div class="detail_box">
                                    <h6>
                                        Cabello
                                    </h6>
                                    <p>
                                        Realizamos servicios de peluquería como cortes, tintes, alisados y ondulaciones.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="img_box">
                                    <img src="images/manicura.png" alt="">
                                </div>
                                <div class="detail_box">
                                    <h6>
                                        Manicure y pedicure
                                    </h6>
                                    <p>
                                        Ofrecemos tratamientos personalizados para el cuidado y el embellecimiento de tus manos y pies, asegurando que tus uñas luzcan impecables y tu piel se sienta suave y saludable.
                                        
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="img_box">
                                    <img src="images/masaje-facial.png" alt="">
                                </div>
                                <div class="detail_box">
                                    <h6>
                                        Trataminetos Faciales
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



    {{-- <!-- Galeria -->
    <section class="gallery-section " style="padding: 20px;">
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
    <!-- Galeria --> --}}





    {{-- <section class="buy_section layout_padding">
    </section> --}}

    <!-- Testimonios -->
    <section class="client_section layout_padding2">
        <div class="container">
            <h2 class="custom_heading text-center">
                Lo que dicen nuestros
                <span>
                    Clientes
                </span>
            </h2>
            <p class="text-center">
                Algunos testimonios de clientes 
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
                            <div class="client_container">
                                <div class="img_box">
                                    <img src="images/reseña2.jpg" alt="">
                                </div>
                                <div class="detail_box">
                                    <h5>
                                        Sarai Galindo
                                    </h5>
                                    <p>
                                        ¡Estoy encantada con mi nuevo corte de cabello! El estilista escuchó atentamente lo que quería y me recomendó un estilo que se adapta perfectamente a mi rostro. El servicio fue rápido y profesional. Definitivamente volveré.!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="layout_padding2 pl-100">
                            <div class="client_container ">
                                <div class="img_box">
                                    <img src="images/reseña1.jpg" alt="">
                                </div>
                                <div class="detail_box">
                                    <h5>
                                        Laura Martínez
                                    </h5>
                                    <p>
                                    La manicura que recibí fue excelente. El personal fue muy amable y se aseguró de que mis uñas quedaran perfectas. El ambiente del salón es muy relajante y me sentí muy cómoda durante todo el proceso. ¡Recomiendo este lugar al 100%!
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
                                        Ana Pérez
                                    </h5>
                                    <p>
                                    El facial que me hice fue increíble. La esteticista fue muy profesional y me explicó cada paso del tratamiento. Mi piel se siente mucho más suave y radiante. ¡Es el mejor facial que he tenido en mucho tiempo
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </section>

<section class="about_section" style="padding: 30px 0px 0px 0px;">
  <div class="container text-center text-md-start ">
    <!-- Grid row -->
    <div class="row mt-3">
      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <!-- Content -->
        <h6 class="text-uppercase fw-bold mb-4">
          <i class="fas fa-gem me-3"></i>Vividis Salon Profesional
        </h6>
        <img src="images\lo.png" style="width: 250px;">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Section: Social media -->
        <h6 class="text-uppercase fw-bold mb-4">
          Nuestras Redes Sociales
        </h6>
        <p>
          <a href="https://www.facebook.com/VividiSalon/?locale=es_LA" class="text-reset"><i class="fab fa-facebook-f"></i></a>
        </p>
        <p>
          <a href="https://www.instagram.com/vividisalon/" class="text-reset"><i class="fab fa-instagram"></i></a>
        </p>
        <p>
          <a href="https://www.tiktok.com/@vividisalon?is_from_webapp=1&sender_device=pc" class="text-reset"><i class="fab fa-tiktok"></i></a>
        </p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Section: Social media -->
        <h6 class="text-uppercase fw-bold mb-4">
          SERVICIOS
        </h6>
        <p>
          <a href="#inicio" class="text-reset">INICIO</a>
        </p>
        <p>
          <a href="#cita" class="text-reset">AGENDAR CITA</a>
        </p>
        <p>
          <a href="#faqs" class="text-reset">FAQs</a>
        </p>
        <p>
          <a href="#nosotros" class="text-reset">NOSOTROS</a>
        </p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold mb-4">CONTACTANOS</h6>
        <p><i class="fas fa-home me-3"></i>6TA CALLE 8-45 ZONA1,<br> BARRIO LAS CASAS, COATEPEQUE</p>
        <p>
          <i class="fas fa-envelope me-3"></i>
          contacto@vividisalonprofesional.com
        </p>
        <p><i class="fas fa-phone me-3"></i> +502 5800-0465</p>
        <p><i class="fas fa-phone me-3"></i> +502 3997-6020</p>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
</section>
<!-- Section: Links  -->

<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
  © 2024 Copyright:Vividis Salon Profesional
  <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ADK</a>
</div>
<!-- Copyright -->
{{-- </footer> --}}
<!-- Footer -->
@endsection