<html>
    <head>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))

           @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
           <style>
            
           </style>
        @endif
    </head>
    <body>
        <p>formularioário de Cadastro</p>
        <form action="/api/enviar" method="POST">
            @csrf
            <input type="email" name="email" placeholder="email"/>
            <br>
            <input type="password" name="password"/>
            <br>
            <input type="submit"/>
        </form>
    </body>
</html>