<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quacks</title>
    <style>
        body {
            background-color: #191b1d;
            color: white;
        }

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
            color: black;
            border: 4px solid #6e6e6e8c;
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

        #quackea p a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <main>
        @if (Auth::check())
        <h2 style="margin-bottom: 20px;">Bienvenido, <a href="/users/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a></h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="padding: 5px 10px; border-radius: 5px; background-color: lightcoral; color: white; border: none;">Cerrar sesión</button>
        </form>
        @endif
        <p><?= count($quacks) ?> quacks</p>
        @foreach ($quacks as $quack)
        <article>
            <h3><a href="/users/{{ $quack->user->id }}">{{ $quack->user->name }}</a> {{ date('d/m/Y H:i', strtotime($quack->created_at)) }}</h3>
            @if(auth()->user()->id != $quack->user_id && !auth()->user()->follows->contains('id', $quack->user->id))
            <form action="/users/{{ $quack->user->id }}/follow" method="POST">
                @csrf
                <button type="submit">Follow</button>
            </form>
            @endif
            @if(auth()->user()->follows->contains('id', $quack->user->id))
            <form action="/users/{{ $quack->user->id }}/unfollow" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Unfollow</button>
            </form>
            @endif
            <p>{{ $quack->mensaje }}</p>
            @if(auth()->user()->id == $quack->quavs->contains('id', auth()->user()->id))
            <form action="/dequav/{{ $quack->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button>Dequav</button>
            </form>
            @endif
            @if(auth()->user()->id != $quack->user_id && auth()->user()->id != $quack->quavs->contains('id', auth()->user()->id))
            <form action="/quav/{{ $quack->id }}" method="POST">
                @csrf
                <button>🦆Quav</button>
            </form>
            @endif
            <?= count($quack->quavs) ?>
            <p><a href="/quacks/{{$quack->id}}">Ver mas detalles</a></p>
            @if($quack->user_id == auth()->user()->id)
            <form action="/quacks/{{$quack->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button>Eliminar</button>
            </form>
            <p><a href="/quacks/{{ $quack->id }}/edit">Editar</a></p>
            @endif
        </article>
        @endforeach
    </main>
    <div id="quackea">
        <p><a href="/quacks/create">🦆</a></p>
    </div>
</body>

</html>