<!-- resources/views/alumnos/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos</title>
</head>
<body>
    <h1>Listado de Alumnos</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('alumnos.create') }}">Crear nuevo alumno</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->ciudad }}</td>
                <td>
                    <a href="{{ route('alumnos.show', $alumno) }}">Ver</a> |
                    <a href="{{ route('alumnos.edit', $alumno) }}">Editar</a> |
                    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
