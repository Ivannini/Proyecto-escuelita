<!-- resources/views/alumnos/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Alumno</title>
</head>
<body>
    <h1>Detalle del Alumno</h1>
    <p><strong>ID:</strong> {{ $alumno->id }}</p>
    <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
    <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
    <p><strong>Ciudad:</strong> {{ $alumno->ciudad }}</p>

    <a href="{{ route('alumnos.index') }}">Volver al listado</a>
</body>
</html>
