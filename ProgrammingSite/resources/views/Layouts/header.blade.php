<n class="z-0 relative top-nav"  x-data="{open:false,menu:false, lokasi:false}">
    <div class="relative z-10 shadow">
        <div class="ml-3 mr-3 max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex items-center px-2 lg:px-0">
            <div class="hidden lg:block lg:ml-2">
                <div class="flex">

                <a href="{{ route('home') }}" style="transition: 0.2s ease-in-out" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-green-400 font-semibold hover:bg-green-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-white-500 "> Home </a>
                @role('Admin')
                   
                    <a href="#" style="transition: 0.2s ease-in-out" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-green-400 font-semibold hover:bg-green-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-white-500 "> Dashboard </a>

                @endrole

                </div>
            </div>
            </div>

            <div id="user-icon" class="flex items-start w-max-content mt-1 rounded-xl" style="transition: 0.2s;height: 40px">

                @auth
                    <a href="{{ route('profile') }}"><svg class="text-green-400 p-2" style="transition: 0.2s ease-in-out;height: 40px;border-radius: 20px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle fill="none" cx="12" cy="7" r="3"></circle><path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z"></path></svg></a>
                    <a href="{{ route('profile') }}"><label class="hover:cursor-pointer text-white p-2">{{ $auth->name }}</label></a>
                @else
                    <a href="{{ route('signin.show') }}"><svg class="text-green-400 hover:text-white p-2" style="transition: 0.2s ease-in-out;height: 40px;border-radius: 20px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle fill="none" cx="12" cy="7" r="3"></circle><path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z"></path></svg></a>
                @endauth

            </div>
        </div>
        </div>
    </div>
