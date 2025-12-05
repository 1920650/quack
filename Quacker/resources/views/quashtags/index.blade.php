<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>QUASHTAGS REGISTRADOS</h1>
    <a href="{{ route('quashtags.create') }}">Crear quashtag</a>
    <ul>
        @foreach ($quashtags as $quashtag)
            <li>
                {{ $quashtag->tag }} 
                <a href="/quashtags/{{ $quashtag->id }}/edit">Editar</a>
                <form action="/quashtags/{{ $quashtag->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
</body>
</html>