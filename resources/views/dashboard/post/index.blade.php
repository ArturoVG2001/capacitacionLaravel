@extends('dashboard.layout')

@section('content')
    <h1>Hola mundo Laravel</h1>

    <a href="{{ route("post.create") }}"></a>

    <table>
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Categoria</td>
                <td>Posted</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{$p->title}}</td>
                    <td>{{$p->category->title}}</td>
                    <td>{{$p->posted}}</td>
                    <td>
                        <a href="{{route("post.edit", $p) }}">Editar</a>
                        <a href="{{route("post.show", $p) }}">Vista</a>

                        <form action="{{route("post.destroy", $p) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}


@endsection



