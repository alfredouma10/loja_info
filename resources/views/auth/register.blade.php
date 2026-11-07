@extends('layouts.loja_info')

@section('content')
<h1>Registo</h1>
<div id="registerBox">
    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Nome</h1>
        <input id="name" name="name" type="text" placeholder="Nome">
        <h1>Endereço de email</h1>
        <input id="email" name="email" type="email" placeholder="Endereço de Email">
        <h1>Senha</h1>
        <input id="password" name="password" type="password" placeholder="Senha">
        <h1>Confirmar senha</h1>
        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar senha">
    </form>
    <div class="registerButtons">
        <a href="{{ route('products.index') }}">
            <div class="button">
                Voltar
            </div>
        </a>
        <a href="{{ route('login') }}">
            <div class="button">
                Entrar
            </div>
        </a>
        <div class="button" onclick="submitForm('registerForm')">
            Registar
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>
@endsection
