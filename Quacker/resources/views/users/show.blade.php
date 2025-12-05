<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ $user->name }}</h1>

    <p><strong>Email:</strong> {{ $user->email }}</p>

    <a href="{{ route('users.index') }}">Volver</a>
</body>

</html>