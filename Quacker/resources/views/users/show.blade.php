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
    </style>
</head>

<body>
    <h1>{{ $user->name }}</h1>
    @if(auth()->user()->id == $user->id)
    <a href="{{ route('users.edit', $user) }}" style="color: cyan">Editar Perfil</a>
    @endif
    <p><strong>Email:</strong> {{ $user->email }}</p>
    @if(auth()->user()->id != $user->id)
        @if(auth()->user()->follows->contains('id', $user->id))
        <form action="/users/{{ $user->id }}/unfollow" method="POST">
            @csrf
            @method('DELETE')
            <button>Unfollow</button>
        </form>
        @else
        <form action="/users/{{ $user->id }}/follow" method="POST">
            @csrf
            <button>Follow</button>
        </form>
        @endif
        @endif
    <p><strong>Siguiendo:</strong> {{ count($user->follows) }}</p>
    <p><strong>Seguidores:</strong> {{ count($user->followers) }}</p>

    <a href="{{ route('quacks.index') }}" style="color: cyan">Volver</a>
    <h2 style="text-align: center;">QUACKS</h2>
    <main>
        @foreach ($user->quacks as $quack)
        <article>
            <h3><a href="/users/{{ $quack->user->id }}">{{ $quack->user->name }}</a> {{ date('d/m/Y H:i', strtotime($quack->created_at)) }}</h3>
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
</body>

</html>