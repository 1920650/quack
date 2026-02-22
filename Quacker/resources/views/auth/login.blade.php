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
    <h2>Login</h2>
    @if($errors->any())
    <p style="color:red;">{{ $errors->first() }}</p>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit">Login</button>

        <p>
            no tienes cuenta?
            <a href="{{ route('register') }}">Registrarse</a>

        </p>
    </form>
</body>

</html>