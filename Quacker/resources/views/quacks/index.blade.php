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
        #quackea {
            position: fixed;
            top: 20px;
            left: 20px;
        }
        #quackea p {
            font-size: 2rem;
            background: lightblue;
            border-radius: 50%;
            padding: 10px;
        }
        #quackea p a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <main>
        @foreach ($quacks as $quack)
        <article>
            <h3>{{ $quack->user->name }} {{ $quack->created_at }}</h3>
            <p>{{ $quack->mensaje }}</p>
            <p><a href="/quacks/{{$quack->id}}">Ver mas detalles</a></p>
            <form action="/quacks/{{$quack->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button>Eliminar</button>
            </form>
            <p><a href="/quacks/{{ $quack->id }}/edit">Editar</a></p>
        </article>
        @endforeach
    </main>
    <div id="quackea">
        <p><a href="/quacks/create">🦆</a></p>
    </div>
</body>
</html>