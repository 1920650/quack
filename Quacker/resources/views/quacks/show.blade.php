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
    </style>
</head>
<body>
 
    <main>
        <article>
            <h3><a href="/users/{{ $quack->user->id }}" style="color: black; text-decoration: none;">{{ $quack->user->name }}</a> {{ date('d/m/Y H:i', strtotime($quack->created_at)) }}</h3>
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
            <p><a href="/quacks">Volver</a></p>
        </article>
    </main>
</body>
</html>