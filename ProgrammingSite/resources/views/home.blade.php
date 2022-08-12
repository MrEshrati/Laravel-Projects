<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('Layouts.links')

</head>
<body>
    <header class="main-header">
        @include('Layouts.header')
    </header>

    <div class="head-container">
        <h1>What's <span class="auto-type"></span></h1>
    </div>    

    <div class="seperator-parent pb-2"><div class="seperator-line"></div></div>

    <div class="slider-card-div">
        <div class="container-body">
            @include('Layouts.cardslider')
        </div>
    </div>

    <footer>
       @include('Layouts.footer') 
    </footer>    

    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/js/script.js"></script>
</body>
</html>