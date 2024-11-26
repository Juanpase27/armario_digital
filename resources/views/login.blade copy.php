<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    @include('partials.nav')
    <h1>Home Login</h1>
    

    <form method="POST">
        @csrf
        <label for="">
            <input type="email" name="email" id="" placeholder="Email...">
        </label><br>
        <label for="">
            <input type="password" name="password" id="" placeholder="Contraseña...">
        </label><br>

        <button type="submit">Enviar</button>
    </form>

    </body>

</html>
