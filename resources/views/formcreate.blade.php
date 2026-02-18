<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body>
        <div class="">
        <p>formularioário de Cadastro</p>
        <form action="/api/enviar" method="POST" >
            @csrf
            <input type="email" name="email" placeholder="email"/>
            <br>
            <input type="password" name="password"/>
            <br>
            <input type="submit"/>
        </form>
        </div>
    </body>
</html>