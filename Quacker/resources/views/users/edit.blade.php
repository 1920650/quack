<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Editar Usuario</h1>

    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        Nombre: <input name="name" value="{{ $user->name }}"><br>
        Email: <input name="email" value="{{ $user->email }}"><br>
        Password (opcional): <input type="password" name="password"><br>

        <button>Actualizar</button>
    </form>
</body>

</html>