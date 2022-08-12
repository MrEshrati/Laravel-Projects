<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Layouts.links')
</head>
<body>
    <header>
        @include('Layouts.header')
    </header>

    <div class="main-profile">
        <div class="container d-flex justify-content-center">
            <div class="card-profile p-3 py-4">
                <div class="text-center"> 
                    <img src="https://imgs.search.brave.com/ANyA2zXHibQvnQliNTO2qEW_-jn2rZfc3RV_-cUQMyU/rs:fit:860:900:1/g:ce/aHR0cDovL3d3dy5w/bmdhbGwuY29tL3dw/LWNvbnRlbnQvdXBs/b2Fkcy81L1Byb2Zp/bGUtQXZhdGFyLVBO/Ry5wbmc" width="100" class="rounded-circle">
                    <h3 class="mt-2">{{ $auth->name }}</h3>
                </div>
                       
            </div>
        </div>
        <div class="interests-div">
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
        <div>
          <label class="usage-label">We Suggest To You</label>
    </div>

    <footer>
        @include('Layouts.footer')
    </footer>
</body>
</html>