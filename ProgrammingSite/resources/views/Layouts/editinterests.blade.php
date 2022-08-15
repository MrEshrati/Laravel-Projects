<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('Layouts.links')
</head>
<body class="interest-body">

    <header class="main-header">
        @include('Layouts.header')
    </header>

    <form action="{{  route('interests.save') }}" method="POST">
        @csrf
        <div class="main-interests-div">
            <div class="interest-img-div">
                <img src="https://imgs.search.brave.com/ANyA2zXHibQvnQliNTO2qEW_-jn2rZfc3RV_-cUQMyU/rs:fit:860:900:1/g:ce/aHR0cDovL3d3dy5w/bmdhbGwuY29tL3dw/LWNvbnRlbnQvdXBs/b2Fkcy81L1Byb2Zp/bGUtQXZhdGFyLVBO/Ry5wbmc" width="150" class="rounded-circle">
            </div>
            <div class="interest-info-div">
                <label>Hi, Dear <span>{{ $auth->name }}</span></label>
            </div>
                <div class="select-div">
                        <select placeholder="Select Your Interest/Interests" name="interests[]" class="interests-select" multiple multiselect-select-all='true'>


                                @foreach ($allUsages as $Usage)
                                    @if(in_array($Usage->id , $interest_id))
                                        <option class="select-option" value="{{$Usage->id}}" selected>{{$Usage->name}}</option>
                                    @else
                                        <option class="select-option" value="{{$Usage->id}}">{{$Usage->name}}</option>
                                    @endif
                                @endforeach


                        </select>
                </div>
                <div class="interest-button"><button type="submit">Submit</button></div>
        </div>
    </form>

    <footer>
        @include('Layouts.footer')
    </footer>

    <script type="text/javascript" src="/js/multiselect-dropdown.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>