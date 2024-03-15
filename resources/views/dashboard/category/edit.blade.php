@extends('dashboard.layout')
@section('content')
    <h1>Actualizar Categoria: {{$category->title}}</h1>

    @include('dashboard.fragment.errors-from')

    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @method("PATCH")
        @include('dashboard.category._form')

    </form>
@endsection