<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Outfits')</title>

    <!-- Vincular el archivo CSS de Tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Incluir el script de Tailwind CSS (opcional) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Incluir Font Awesome (opcional, si necesitas iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMF4jS9sG9jG3y8e1Hh0g1g3E6H0C5u9g5H5M5" crossorigin="anonymous">

    <!-- Agregar otros estilos o scripts que necesites -->

</head>

<body class="bg-gray-100">
    @include('partials.nav')
    

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <!-- Incluir scripts adicionales si es necesario -->
    @yield('scripts')
</body>

</html>
