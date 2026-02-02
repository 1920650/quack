<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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