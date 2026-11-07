@extends('layouts.loja_info')

@section('content')
<h1>Categorias</h1>
<div id="categoryBox">
    @foreach ($categorias as $categoria)
        <div class="categoryItemBox">
            <div class="categoryName">
                <h2>{{ $categoria->Name }}</h2>
            </div>
            <a href="{{ route('categories.edit', $categoria->id) }}">
                <div class="editButton" title="Editar {{ $categoria->Name }}">
                    <img src="/img/edit.svg">
                </div>
            </a>
            <div class="deleteButton" onclick="submitForm('destroy_{{ $categoria->id }}')" title="Eliminar {{ $categoria->Name }}">
                <img src="/img/delete.svg">
                <form id="destroy_{{ $categoria->id }}" action="{{ route('categories.destroy', $categoria->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
