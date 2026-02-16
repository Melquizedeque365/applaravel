<html>
    <head>

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