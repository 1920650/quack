<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Usuario</h1>

    <form method="POST" action="{{ route('quashtags.update', $quashtag) }}">
        @csrf
        @method('PUT')

        Quashtag: <input name="tag" value="{{ $quashtag->tag }}"><br>

        <button>Actualizar</button>
    </form>
</body>
</html>