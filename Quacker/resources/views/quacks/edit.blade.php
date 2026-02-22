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

        h1 {
            color: black;
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
        }

        h1 {
            text-align: center;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        #volver {
            float: right;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <article><h1>Editar Quack</h1></article>
    <main>
        <article>
        <form method="POST" action="/quacks/{{ $quack->id }}">
            @csrf
            @method('PATCH')
            <label for="nickname">Nick:</label>
            <input type="text" name="nickname" value="{{ $quack->user->name }}" readonly>
            <br>
            <br>
            <label >Quack:</label>
            <br>
            <textarea name="mensaje" id="" cols="30" rows="10">{{$quack->mensaje}}</textarea>
            <br>
            <br>
            <button>Quackea o muere</button><a href="/quacks" id="volver">Volver</a>
        </form>
       </article>
    </main>
        
    
</body>
</html>