<div id="view" class="h-full w-screen flex flex-row" x-data="{ sidenav: true }">
  <div id="sidebar" style="background-color: #0c121a" class="h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out" @click.away="sidenav = false">
    <div class="space-y-6 md:space-y-10 mt-10">
      <h1 class="font-bold text-4xl text-center md:hidden">
        D<span class="text-teal-600">.</span>
      </h1>
      @role('CEO')
        <h1 class="hidden text-teal-600 md:block font-bold text-sm md:text-xl text-center">
          CEO Dashboard<span class="text-teal-600">.</span>
        </h1>
      @elserole('Admin')
        <h1 class="hidden text-teal-600 md:block font-bold text-sm md:text-xl text-center">
          Owner Dashboard<span class="text-teal-600">.</span>
        </h1>
      @endrole
      <div id="menu" class="flex flex-col space-y-2">
        <a href="{{ route('home') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-yellow-400 hover:text-black hover:scale-105 rounded-md transition duration-150 ease-in-out">
          <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
          </svg>
          <span class="">Home</span>
        </a>
        <a href="{{ route('user.index') }}" class="text-sm font-medium text-white py-2 px-2 hover:bg-yellow-400 hover:text-black hover:scale-105 rounded-md transition duration-150 ease-in-out">
          <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
          <span class="">Users</span>
        </a>
      </div>
    </div>
  </div>    
</div>