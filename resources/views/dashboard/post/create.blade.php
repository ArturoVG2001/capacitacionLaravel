@extends('dashboard.layout')
@section('content')
    <h1>Crear post</h1>

    @include('dashboard.fragment.errors-from')

    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <label for="">Titulo</label>
        <input type="text" name="title" value="{{old("title","")}}">

        <label for="">Slug</label>
        <input type="text" name="slug" value="{{old("slug","")}}">
        
        <select name="category_id">
            <option value=""></option>
            @foreach ($categories as $title => $id)
                <option  {{old("category_id") == $id ? "selected" : "" }} value="{{ $id }}">{{$title}}</option>    
            @endforeach
        </select>
        <label for="">Posteado</label>
        <select name="posted">
            <option {{ old("posted","") == "yes" ? "selected" : ""}} value="yes">Si</option>
            <option {{ old("posted","") == "not" ? "selected" : ""}} value="not">No</option>
        </select>

        <label for="">Contenido</label>
        <textarea name="content" >{{old("content","")}}</textarea>
        
        <label for="">Descripcion</label>
        <textarea name="description">{{old("description","")}}</textarea>
        
        <button type="submit">Enviar</button>
    </form>
@endsection