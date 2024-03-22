@extends('dashboard.layout')

@section('content')


<a href="{{ route("category.create")}}">Crear</a>
    <h1>Hola mundo Laravel</h1>

    <table>
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>{{$c->title}}</td>
                    
                    <td>
                        <a href="{{route("category.edit", $c) }}">Editar</a>
                        <a href="{{route("category.show", $c) }}">Vista</a>

                        <form action="{{route("category.destroy", $c) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}


@endsection



