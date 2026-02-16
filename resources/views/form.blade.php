<html>

<head></head>

<body>

    <p>formulário</p>
    <form action="/api/auth/login" method="POST">
        @csrf
        <input type="email" name="email" className="rounded-sm" placeholder="email"/>
        <br>
        <input type="password" name="password"/>
        <br>
        <input type="submit"/>
    </form>
</body>

</html>