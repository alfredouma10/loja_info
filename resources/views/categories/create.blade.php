@extends('layouts.loja_info')

@section('content')
@isset($categoria)
    <h1>Editar {{ $categoria->Name }}</h1>
@else
    <h1>Criar Categoria</h1>
@endisset

<div id="createCategoryBox">
    <form id="createCategoryForm" method="POST"
        @isset($categoria)
            action="{{ route('categories.update', $categoria->id) }}"
        @else
            action="{{ route('categories.store') }}"
        @endisset
    >
        @csrf
        @isset($categoria)
            @method('PUT')
        @endisset

        <h1>Nome da Categoria</h1>
        <input id="name" name="name" type="text" placeholder="Nome da Categoria" value="{{ old('name') !== null ? old('name') : (isset($categoria) ? $categoria->Name : '') }}">
    </form>

    <div class="createCategoryButtons">
        <a href="{{ route('dashboard') }}">
            <div class="button">
                Voltar
            </div>
        </a>
        <div class="button" onclick="submitForm('createCategoryForm')">
            Gravar
        </div>
    </div>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>
@endsection
