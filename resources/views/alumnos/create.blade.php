<!-- resources/views/alumnos/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Alumno</title>
</head>
<body>
    <h1>Crear Alumno</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        <br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="{{ old('correo') }}">
        <br><br>

        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        <br><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad') }}">
        <br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('alumnos.index') }}">Volver al listado</a>
</body>
</html>
