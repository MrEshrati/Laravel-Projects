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

    <div class="main-profile">

        <div class="card-profile p-3 py-4">
            <div class="text-center"> 
                <img src="https://imgs.search.brave.com/ANyA2zXHibQvnQliNTO2qEW_-jn2rZfc3RV_-cUQMyU/rs:fit:860:900:1/g:ce/aHR0cDovL3d3dy5w/bmdhbGwuY29tL3dw/LWNvbnRlbnQvdXBs/b2Fkcy81L1Byb2Zp/bGUtQXZhdGFyLVBO/Ry5wbmc" width="100" class="rounded-circle">
                <h3 class="mt-2">{{ $auth->name }}</h3>
            </div>
                    
        </div>

        <div class="interests-div">
          <label class="usage-label">Interests :</label>
          <a class="edit-a" href="{{ route('interests.edit') }}">Edit</a>
          <p class="usages-name">
            @for ($i = 0; $i < count($usages);$i++)

                @if ($i == count($usages)-1 || count($usages) < 1)
                    
                    {{ $usages[$i]->name }} 

                @else
                
                    {{ $usages[$i]->name }} -
                    
                @endif
                
            @endfor
          </p>
        </div>
        <div class="lan-suggest">
            <label class="usage-label">We Suggest To You :</label>
          
            <div class="suggest-card mt-3">
                <div class="suggest-inner-div">
                
                    @foreach ($suggestedLanguages as $suggest)
                
                        <a href="{{ route('read_more' , $suggest) }}"><img src="{{ asset($suggest->image_url) }}"></a>
                        <label>{{ $suggest->name }}</label>
                        <div class="lan-seperator"></div>
                    @endforeach
                </div>
            </div>
                   
        </div>
    </div>

    <footer>
        @include('Layouts.footer')
    </footer>

    <script src="/js/script.js"></script>
</body>
</html>