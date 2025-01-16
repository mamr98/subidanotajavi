<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Muestras</h1>
    @foreach ($muestras as $m)
      <p>{{ $m->id }} {{ $m->fecha }} {{ $m->tipo->nombre }}</p>
    @endforeach
</body>
</html>