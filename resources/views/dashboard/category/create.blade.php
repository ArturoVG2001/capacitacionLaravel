@extends('dashboard.layout')
@section('content')

    <h1>Crear category</h1>

    @include('dashboard.fragment.errors-from')

    <form action="{{ route('category.store') }}" method="POST">
        @include('dashboard.category._form')

    </form>
@endsection