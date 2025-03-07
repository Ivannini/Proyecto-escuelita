<!-- resources/views/alumnos/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $alumno->nombre) }}"><br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="{{ old('correo', $alumno->correo) }}"><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}"><br><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $alumno->ciudad) }}"><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('alumnos.index') }}">Volver al listado</a>
</body>
</html>
