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

    <div class="main-readmore">
        <div class="item-main-info">
            <div class="item-img">
                <img src='{{ asset($Language[0]->image_url) }}'>
            </div>
            <div class="item-info">
                <label>{{ $Language[0]->name }}</label>
                <p>{{ $Language[0]->description }}</p>
            </div>
            <div class="item-more-info">

                <div class="item-dev duration-200 hover:scale-105 hover:shadow-xl">
                    <label>Developer Or Company : <span class="dev-name">{{ $Language[0]->company->name }}</span></label>
                    <p class="dev-description">{{ $Language[0]->company->description }}</p>
                </div>
    
                <div class="item-usage duration-200 hover:scale-105 hover:shadow-xl">
                    <label class="usage-label">Usages :</label>

                    <p class="usages-name">
                        @foreach ($Usages as $Use)

                            @for($i = 0; $i < $Usage->count();$i++)

                                @if($Use->id == $Usage[$i]->usage_id)
                                    
                                    @if ($i == $Usage->count()-1 || $Usage->count() < 1)
                                        
                                        {{ $Use->name }} 

                                    @else
                                    
                                        {{ $Use->name }} -
                                        
                                    @endif
                                @endif

                                

                            @endfor
                            
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        @include('Layouts.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/js/script.js"></script>
</body>
</html>