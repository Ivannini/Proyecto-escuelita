<!-- resources/views/alumnos/show.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">📄 Detalle del Alumno</h1>

        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ $alumno->nombre }}</h5>
                <p class="card-text"><strong>📌 ID:</strong> {{ $alumno->id }}</p>
                <p class="card-text"><strong>📧 Correo:</strong> {{ $alumno->correo }}</p>
                <p class="card-text"><strong>🎂 Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
                <p class="card-text"><strong>🌍 Ciudad:</strong> {{ $alumno->ciudad }}</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">⬅️ Volver al listado</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
