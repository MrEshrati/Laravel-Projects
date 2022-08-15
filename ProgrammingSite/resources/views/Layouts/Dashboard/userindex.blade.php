<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Layouts.Dashboard.dashboardlinks')
</head>
<body style="background-color: #2b323c">

    <div style="position: relative">

        <div style="width: 25%;position: absolute;">
            @include('Layouts.Dashboard.dashboard')
        </div>
        <div style="left:240;width: 84%;position: absolute;align-content: center;justify-content: space-around;display: flex;flex-wrap: wrap;" id="game-div" class=" h-screen px-4">
        
                @role("Admin")
                    @foreach ($allUsers as $allUser)

                        @if($allUser->getRoleNames()[0] != 'Admin')
                            
                            <div style="background-color: #222;height:110px;text-align:center;" class="max-w-sm overflow-hidden rounded-xl shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                                <h1 class="ml-1 mt-5 text-2xl font-medium text-yellow-300">{{ $allUser->name }}</h1>
                                <div style="margin-left: 8%;margin-top: 14px;justify-content: space-around;display: flex;width: 83%;height: 100%">
                                    <form method="POST" action="{{ route('user.destroy' , $allUser) }}">
                                        @csrf
                                        @method("delete")
                                        <button style="margin-left: 8px" type="submit"><svg class="text-red-600 hover:bg-red-600 hover:text-white" style="padding: 5px;border-radius: 15px;transition: 0.2s ease-in-out" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"></path><path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"></path></svg></button>
                                    </form>
                
                                    <a href="{{ route('user.show' , $allUser) }}">
                                    
                                        <svg class="text-blue-600 hover:bg-blue-600 hover:text-white" style="padding: 5px;border-radius: 15px;transition: 0.2s ease-in-out" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm32 664c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V456c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v272zm-32-344a48.01 48.01 0 0 1 0-96 48.01 48.01 0 0 1 0 96z"></path></svg></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @elserole('CEO')
                    @foreach ($allUsers as $allUser)

                        @if($allUser->getRoleNames()[0] != 'Admin' && $allUser->getRoleNames()[0] != 'CEO')
                            <div style="background-color: #222;height:110px;text-align:center;" class="max-w-sm overflow-hidden rounded-xl shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                                <h1 class="ml-1 mt-5 text-2xl font-medium text-yellow-300">{{ $allUser->name }}</h1>
                                <div style="margin-left: 8%;margin-top: 14px;justify-content: space-around;display: flex;width: 83%;height: 100%">
                                    <form method="POST" action="{{ route('user.destroy' , $allUser) }}">
                                        @csrf
                                        @method("delete")
                                        <button style="margin-left: 8px" type="submit"><svg class="text-red-600 hover:bg-red-600 hover:text-white" style="padding: 5px;border-radius: 15px;transition: 0.2s ease-in-out" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"></path><path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"></path></svg></button>
                                    </form>

                                    <a href="{{ route('user.show' , $allUser) }}">
                                    
                                        <svg class="text-blue-600 hover:bg-blue-600 hover:text-white" style="padding: 5px;border-radius: 15px;transition: 0.2s ease-in-out" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm32 664c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V456c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v272zm-32-344a48.01 48.01 0 0 1 0-96 48.01 48.01 0 0 1 0 96z"></path></svg></a>
                                </div>
                            </div>
                        @endif  
                    @endforeach
                @endrole
                
                    <a href="{{ route('user.create') }}"><div style="height:110px;background-color: #222" class="max-w-sm overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                        <svg class="text-white" style="margin: 0  auto;margin-top: 10%" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="50%" width="50%" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm192 472c0 4.4-3.6 8-8 8H544v152c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V544H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h152V328c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v152h152c4.4 0 8 3.6 8 8v48z"></path></svg>
                
                </div></a>
            </div>    
    </div>
</body>
</html>