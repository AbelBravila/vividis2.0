<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Citas</title>
</head>

<body>

    <h2 class="text-center">Listado de Citas</h2>

    {{--<img src="{{ public_path() . $image }}" alt="" width="100" height="150" />--}}

    <table class="table table-bordered table-striped">
    <thead class="table-dark text-white">
                                        <tr>
                                            <th class="px-4 py-2 text-white text-center">ID</th>
                                            <th class="px-4 py-2 text-white text-center">Especialista</th>
                                            <th class="px-4 py-2 text-white text-center">Trabajo</th>
                                            <th class="px-4 py-2 text-white text-center">Horas Estimadas</th>
                                            <th class="px-4 py-2 text-white text-center">Fecha Cita</th>
                                            <th class="px-4 py-2 text-white text-center">Horario Cita</th>
                                            <th class="px-4 py-2 text-white text-center">Cliente</th>
                                            <th class="px-4 py-2 text-white text-center">Telefono Cliente</th>
                                            <th class="px-4 py-2 text-white text-center">Estado</th>
                           
                                        </tr>
                                    </thead>

        <tbody>
            @foreach ($citas as $cita)
            <tr>
                <td>{{ $tbCita->IdCita }}</td>
                <td>{{ $tbCita->NombrePersona }}</td>
                <td>{{ $tbCita->NombreTrabajo }}</td>
                <td>{{ $tbCita->TiempoEstimado }}</td>
                <td>{{ $tbCita->FechaCita }}</td>
                <td>{{ $tbCita->Horario }}</td>
                <td>{{ $tbCita->name }}</td>
                <td>{{ $tbCita->Telefono }}</td>
                <td>{{ $tbCita->Estado }}</td>
                <td>{{ $tbCita->IdCita }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>