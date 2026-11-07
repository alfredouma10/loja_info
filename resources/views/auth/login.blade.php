@extends('layouts.loja_info')

@section('content')
<h1>Entrar</h1>
<div id="loginBox">
    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Endereço de email</h1>
        <input id="email" name="email" type="email" placeholder="Endereço de Email">
        <h1>Senha</h1>
        <input id="password" name="password" type="password" placeholder="Senha">
    </form>
    <div class="loginButtons">
        <a href="{{ route('products.index') }}">
            <div class="button">
                Voltar
            </div>
        </a>
        <a href="{{ route('register') }}">
            <div class="button">
                Registo
            </div>
        </a>
        <div class="button" onclick="submitForm('loginForm')">
            Entrar
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>
@endsection
