<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Quashtag</h1>

    <form method="POST" action="{{ route('quashtags.store') }}">
        @csrf

        Quashtag: <input name="tag"><br>

        <button>Guardar</button>
    </form>
</body>
</html>