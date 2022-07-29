@extends('dashboard.base')

@section('body')
<div class="font-sans h-screen w-full flex flex-row justify-center items-center bg-gradient-to-r from-rose-100 to-teal-100">
    <div style="background-color: #222" class="card w-96 mx-auto rounded-xl shadow-md duration-200 hover:scale-105 hover:shadow-xl">
       <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white" src="https://pbs.twimg.com/profile_images/1467997254929854470/mDYbXoVl_400x400.jpg" alt="">
       <div class="text-center mt-2 text-3xl font-medium text-yellow-400">{{ $user->name }}</div>
       <div class="text-center mt-3 font-normal text-white text-lg">{{ $user->email }}</div>
       <div class="px-6 text-center mt-2 font-light text-sm">
         <p class="text-white font-light">
          Phone : <span>{{ $user }}</span>
         </p>
       </div>
       <hr class="mt-8">
    </div>
  </div>
@endsection  