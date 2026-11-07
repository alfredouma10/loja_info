<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/base.js"></script>
    <title>Loja de informática</title>
</head>
<body>
    <header>
        <h1><a href="{{ route('products.index') }}">Loja de Informática</a></h1>
        @guest
            @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
                <a href="{{ route('login') }}">
                    <div id="accessButton">
                        Entrar
                    </div>
                </a>
            @endif
        @endguest

        @auth
            <div id="accessButton" onclick="submitForm('logout')">
                <form id="logout" action="{{ route('logout') }}" method="post">@csrf</form>
                Sair
            </div>
            <div id="userGreet">
                <p>Olá {{ auth()->user()->name }}</p>
            </div>
        @endauth
    </header>

    <div id="content">
        @yield('content')
    </div>

    <footer>
        <p>Hugo Perdigão &copy; 2024</p>
    </footer>
</body>
</html>
