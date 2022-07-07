{{-- <nav class="flex items-center justify-between flex-wrap bg-teal p-6">
    <div class="flex items-center flex-no-shrink text-white mr-6">
      <svg class="h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
      <span class="font-semibold text-xl tracking-tight">Tailwind CSS</span>
    </div>
    <div class="block lg:hidden">
      <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
        <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
      <div class="text-sm lg:flex-grow">
        <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
          Docs
        </a>
        <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
          Examples
        </a>
        <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white">
          Blog
        </a>
      </div>
      <div>
        @auth
          
        <a href="{{ route('logout') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0">Logout</a>
        <a href="{{ route('dashboard') }}"><i class="ml-5 fas ew">&#xf406;</i></a>
        <a href="{{ route('cart') }}"><i class='ml-3 fas ew'>&#xf07a;</i></a>  
        @else
        
        <a href="{{ route('login.show') }}"><i class="ml-5 fas ew">&#xf406;</i></a>


        @endauth
    
      </div>

    </div>
  </nav> --}}

<nav class="z-0 relative top-nav"  x-data="{open:false,menu:false, lokasi:false}">
  <div style="background-color: #222" class="relative z-10 bg-yellow-300 shadow">
    <div style="background-color: #222" class="ml-3 mr-3 max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex items-center px-2 lg:px-0">
          <div class="hidden lg:block lg:ml-2">
            <div class="flex">
              @auth
                
                <a href="{{ route('home') }}" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-yellow-300 font-semibold hover:bg-yellow-300 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-white-500 "> Home </a>
                <a href="{{ route('dashboard') }}" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-yellow-300 font-semibold hover:bg-yellow-300 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-white-500 "> Dashboard </a>
                <a href="{{ route('cart') }}" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-yellow-300 font-semibold hover:bg-yellow-300 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-white-500 "> Cart </a>

                @else

                <a href="{{ route('home') }}" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-yellow-300 font-semibold hover:bg-yellow-300 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-white-500 "> Home </a>

              @endauth

            </div>
          </div>
        </div>
        <div class="flex-1 flex justify-center px-2 lg:ml-6 lg:justify-end">

          <div class="max-w-lg w-full lg:max-w-xs">
            <label for="search" class="sr-only">Search </label>
            <form methode="get" action="#" class="relative z-50">
              <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <input type="text" name="s" id="s" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-yellow-200 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out" placeholder="Search">
            </form>
          </div>
        </div>
        <div class="flex items-start px-4 py-6">
          @auth

            <a href="{{ route('logout') }}"><img class="w-9 h-9 rounded-full object-cover mr-4 shadow" src="https://cdn.iconscout.com/icon/premium/png-512-thumb/logout-logout-move-logout-next-logout-direction-1-60709.png" alt="avatar"></a>

            @else

            <a href="{{ route('login.show') }}"><img class="w-7 h-7 rounded-full object-cover mr-4 shadow" src="https://cdn1.iconfinder.com/data/icons/vibrancie-action/30/action_081-account-user-profile-avatar-512.png" alt="avatar"></a>

          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>

