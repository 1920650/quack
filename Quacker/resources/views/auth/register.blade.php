<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
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

<h2>Registro</h2>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label>Nombre:</label>
        <input type="text" name="name" required>
    </div><br>

    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div><br>

    <div>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
    </div><br>

    <div>
        <label>Repetir contraseña:</label>
        <input type="password" name="password_confirmation" required>
    </div><br>

    <button type="submit">Registrarse</button>

</form>

<p>
    ¿Ya tienes cuenta?
    <a href="{{ route('login') }}">Login</a>
</p>

</body>
</html>
