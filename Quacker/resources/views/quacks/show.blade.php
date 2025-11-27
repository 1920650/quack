<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacks</title>
    <style>
        main {
            width: 80%;
            margin: 0 auto;
        }
        article {
            background-color: lightcyan;
            margin: 20px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px black;
            transition: all 0.3s ease;
        }
        article:hover {
            transform: scale(1.1);
            box-shadow: 10px 10px 10px black
        }
    </style>
</head>
<body>
    <main>
        <article>
            <h3>{{ $quack->nickname }} {{ $quack->created_at }}</h3>
            <p>{{ $quack->mensaje }}</p>
            <p><a href="/quacks">Volver</a></p>
        </article>
    </main>
</body>
</html>