<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if($name == "arturo")
        Es true.
    @else
        No es true.
    @endif

    @foreach($array as $a)
        <div class="box item">
            <p>{{ $a }}</p>
        </div>
    @endforeach

    @forelse($array as $a)
        <div class="box item">
            <p>*{{$a}}</p>
        </div>
    @empty
        No hay data
    @endforelse

    <h1>{{ $name }}</h1>

    <!--age-->
    {{$age}}

    {{--Voy a escapar del siguiente html--}}
    {!! $html !!}

</body>
</html>

