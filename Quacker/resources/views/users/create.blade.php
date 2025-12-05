<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Crear Usuario</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        Nombre: <input name="name"><br>
        Email: <input name="email"><br>
        Password: <input type="password" name="password"><br>

        <button>Guardar</button>
    </form>
</body>

</html>