<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
    <title>Registrarse</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    {{--<link rel="stylesheet" href="{{ asset('css/style.css') }}" />--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/foodhut.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
</head>

<body>
    
<style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }

    </style>

        <header class="vh-100 header" style="max-height: 100%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <form method="POST"  action="{{ route('Clientes.store') }}"  style="width: 23rem;">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registrate</h3>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input class="form-control form-control-lg" type="text" id="name" name="name"
                                    placeholder="Esciba su nombre" required>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Contraseña" required>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" name="Telefono" max="99999999" min="10000000" id="Telefono" class="form-control form-control-lg" placeholder="Telefono" required>
                            </div>
                            <div class="pt-1 mb-4">
                                <button type="submit" style="background-color: #F6A39B;"
                                   value="Registrarse" class="btn btn-info btn-lg btn-block">Registrarse</button>
                            </div>
                            <div class="form-outline mt-1">
                                <a href="{{ route('inicio') }}" class="btn btn-secondary">
                                    Regresar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="\images\login.jpg" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </header>
</body>
