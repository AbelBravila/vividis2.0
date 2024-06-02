@extends("LandingPage.index", ['pagina'=>'inicio'])
@section('contenido')

<header class="bg-white shadow">
    
    <div class="header-content">
        <div class="header-menu">
        <label class="pt-2" for="menu-toggle"><span class="las la-bars"></span></label>        
        <div class="mx-auto  pt-2 pb-2 ">
            <h5 class="pt-1 ">Inicio</h2>
        </div> 
        </div>
        <div class="user">
            <div class="bg-img" style="background-image: url('{{ asset('images/papa.jpg') }}')"></div>
            <span class="las la-power-off"></span><a href="{{ route('CerrarSesion') }}">Cerrar Sesión</a>
        </div>
    </div>
</header>

{{-- <div class="page-header">
    <h1>@yield('page-title', 'Dashboard')</h1>
    <small>@yield('breadcrumb', 'Home / Dashboard')</small>
</div> --}}
<div class="x" style="padding-top: 50px; padding-bottom: 50px">
    
    <div class="ps-5 pe-5 mx-auto sm:px-20 lg:px-20">
        
        <div class="about_section2 ps-5 pe-5 overflow-hidden shadow-xl sm:rounded-lg"
            style="border-radius: .5rem;  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
            <div class="page-header">
                <h1>@yield('page-title', 'Bienvenido')</h1>
                <h4>{{ Auth::user()->name }}</h4>
                {{--<small>@yield('breadcrumb', 'Home / Dashboard')</small>--}}
            </div>
        </div>

    </div>
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
@endsection