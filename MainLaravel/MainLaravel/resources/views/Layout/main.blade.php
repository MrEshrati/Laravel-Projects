<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @yield('style')
    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @include('Layout.header')

    @yield('body')

    @yield('script')
</body>
</html>