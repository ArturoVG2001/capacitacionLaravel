@extends('dashboard.layout')
@section('content')
    <h1>Actualizar Post: {{$post->title}}</h1>

    @include('dashboard.fragment.errors-from')

    <form action="{{ route('post.update',$post->id) }}" method="POST">
        @csrf
        @method("PATCH")

        <label for="">Titulo</label>
        <input type="text" name="title" value="{{$post->title}}">

        <label for="">Slug</label>
        <input readonly type="text" name="slug" value="{{$post->slug}}">
        
        <select name="category_id">
            <option value=""></option>
            @foreach ($categories as $title => $id)
                <option {{$post->category_id == $id ? 'selected' : ''}} value="{{ $id }}">{{$title}}</option>    
            @endforeach
        </select>
        <label for="">Posteado</label>
        <select name="posted">
            <option {{$post->posted == 'not' ? 'selected' : ''}} value="not">No</option>
            <option {{$post->posted == 'yes' ? 'selected' : ''}} value="yes">Si</option>
        </select>

        <label for="">Contenido</label>
        <textarea name="content">{{$post->content}}</textarea>
        
        <label for="">Descripcion</label>
        <textarea name="description">{{$post->description}}</textarea>
        
        <button type="submit">Enviar</button>
    </form>
@endsection