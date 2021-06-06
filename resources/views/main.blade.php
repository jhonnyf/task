<!doctype html>
<html lang="pt-br">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <title>TASK</title>
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 brand">
                        <a href="{{ route('board.index') }}">Task</a>
                    </div>
                    <div class="col-md-6 settings">
                        <a href="{{ route('board.index') }}"><i class="fas fa-home"></i></a>
                        <a href="{{ route('config.index') }}"><i class="fas fa-cogs"></i></a>
                        <a href="{{ route('login.logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>        
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @if (getenv('APP_ENV') === 'local')
            <script id="__bs_script__">//<![CDATA[
                document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.14'><\/script>".replace("HOST", location.hostname));
            //]]></script>
        @endif
    </body>
</html>