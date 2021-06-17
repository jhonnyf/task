<!doctype html>
<html lang="pt-br">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <title>TASK</title>
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 brand">
                        <a href="{{ route('board.index') }}" title="Home">EndTasks</a>
                    </div>
                    <div class="col-md-6 settings">
                        <span class="me-3 user-name">Olá, {{ Auth::user()->first_name }}</span>
                        <a href="{{ route('board.index') }}" title="Home"><i class="fas fa-home"></i></a>
                        <a href="{{ route('config.index') }}" title="Configurações"><i class="fas fa-cogs"></i></a>
                        <a href="{{ route('login.logout') }}" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>        
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @if (getenv('APP_ENV') === 'locals')
            <script id="__bs_script__">//<![CDATA[
                document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.14'><\/script>".replace("HOST", location.hostname));
            //]]></script>
        @endif
    </body>
</html>