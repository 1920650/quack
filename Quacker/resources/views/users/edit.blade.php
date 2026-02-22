<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #191b1d;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: lightblue;
            cursor: pointer;
        }

        button:hover {
            background-color: deepskyblue;
        }
    </style>
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