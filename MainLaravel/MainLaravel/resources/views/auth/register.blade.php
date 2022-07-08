@extends('Layout.main')

@section('style')
<style>
  * {
    font-family: "Poppins";
  }

  body {
    -webkit-user-select: none;
      -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
    overflow-y: hidden;
    justify-content: center;
    align-items: center;
    background: #dde5f4;
    height: 100vh;
  }

  .screen-1 {
    background: rgba(34, 34, 34, 0.889);
    margin: 0 auto;
    padding: 2em;
    display: flex;
    width: 25%;
    height: 88%;
    flex-direction: column;
    border-radius: 30px;
    box-shadow: 0 0 2em #e6e9f9;
    gap: 2em;
  }
  .screen-1 .logo {
    margin-top: -3em;
  }
  .screen-1 .email {
    background: white;
    box-shadow: 0 0 1em #ffd300;
    padding: 1em;
    display: flex;
    flex-direction: column;
    gap: 0.5em;
    border-radius: 20px;
    color: #4d4d4d;
    margin-top: -3em;
  }
  .screen-1 .email input {
    outline: none;
    border: none;
  }
  .screen-1 .email input::-moz-placeholder {
    color: black;
    font-size: 0.9em;
  }
  .screen-1 .email input:-ms-input-placeholder {
    color: black;
    font-size: 0.9em;
  }
  .screen-1 .email input::placeholder {
    color: black;
    font-size: 0.9em;
  }
  .screen-1 .email ion-icon {
    color: #4d4d4d;
    margin-bottom: -0.2em;
  }
  .screen-1 .password {
    background: white;
    box-shadow: 0 0 1em #ffd300;
    padding: 1em;
    display: flex;
    flex-direction: column;
    gap: 0.5em;
    border-radius: 20px;
    color: #4d4d4d;
  }
  .screen-1 .password input {
    outline: none;
    border: none;
  }
  .screen-1 .password input::-moz-placeholder {
    color: black;
    font-size: 0.9em;
  }
  .screen-1 .password input:-ms-input-placeholder {
    color: black;
    font-size: 0.9em;
  }
  .screen-1 .password input::placeholder {
    color: black;
    font-size: 0.9em;
  }
  .screen-1 .password ion-icon {
    color: #4d4d4d;
    margin-bottom: -0.2em;
  }
  .screen-1 .password .show-hide {
    margin-right: -5em;
  }
  .screen-1 .login {
    padding: 1em;
    background: #3e4684;
    color: white;
    border: none;
    border-radius: 30px;
    font-weight: 600;
  }
  .screen-1 .footer {
    display: flex;
    font-size: 0.7em;
    color: white;
    gap: 14em;
    padding-bottom: 10em;
    margin: 0 auto;
  }
  .screen-1 .footer span {
    cursor: pointer;
    font-weight: bold
  }

  button {
    cursor: pointer;
  }
</style>
@endsection

@section('body')

{{-- <div
class="min-h-screen flex flex-col items-center justify-center bg-gray-100"
>
<div
  class="
    flex flex-col
    bg-white
    shadow-md
    px-4
    sm:px-6
    md:px-8
    lg:px-10
    py-8
    rounded-3xl
    w-50
    max-w-md
  "
>
  <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
    Join us Now
  </div>
  <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
    Enter your credentials to get access account
  </div>

  <div class="mt-10">
    <form action="{{ route('register') }}" method="post">
      @csrf
      <div class="flex flex-col mb-5">
        <label
          for="email"
          class="mb-1 text-xs tracking-wide text-gray-600"
          >Name:</label
        >
        <div class="relative">
          <div
            class="
              inline-flex
              items-center
              justify-center
              absolute
              left-0
              top-0
              h-full
              w-10
              text-gray-400
            "
          >
            <i class="fas fa-user text-blue-500"></i>
          </div>

          <input
            id="name"
            type="text"
            name="name"
            class="
              text-sm
              placeholder-gray-500
              pl-10
              pr-4
              rounded-2xl
              border border-gray-400
              w-full
              py-2
              focus:outline-none focus:border-blue-400
            "
            placeholder="Enter your name"
          />
        </div>
      </div>
      <div class="flex flex-col mb-5">
        <label
          for="email"
          class="mb-1 text-xs tracking-wide text-gray-600"
          >E-Mail Address:</label
        >
        <div class="relative">
          <div
            class="
              inline-flex
              items-center
              justify-center
              absolute
              left-0
              top-0
              h-full
              w-10
              text-gray-400
            "
          >
            <i class="fas fa-at text-blue-500"></i>
          </div>

          <input
            id="email"
            type="email"
            name="email"
            class="
              text-sm
              placeholder-gray-500
              pl-10
              pr-4
              rounded-2xl
              border border-gray-400
              w-full
              py-2
              focus:outline-none focus:border-blue-400
            "
            placeholder="Enter your email"
          />
        </div>
      </div>

      <div class="flex flex-col mb-5">
        <label
          for="email"
          class="mb-1 text-xs tracking-wide text-gray-600"
          >Phone:</label
        >
        <div class="relative">
          <div
            class="
              inline-flex
              items-center
              justify-center
              absolute
              left-0
              top-0
              h-full
              w-10
              text-gray-400
            "
          >
            <i class="fas fa-at text-blue-500"></i>
          </div>

          <input
            id="phone"
            type="text"
            name="phone"
            class="
              text-sm
              placeholder-gray-500
              pl-10
              pr-4
              rounded-2xl
              border border-gray-400
              w-full
              py-2
              focus:outline-none focus:border-blue-400
            "
            placeholder="Enter your phone"
          />
        </div>
      </div>
      <div class="flex flex-col mb-6">
        <label
          for="password"
          class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600"
          >Password:</label
        >
        <div class="relative">
          <div
            class="
              inline-flex
              items-center
              justify-center
              absolute
              left-0
              top-0
              h-full
              w-10
              text-gray-400
            "
          >
            <span>
              <i class="fas fa-lock text-blue-500"></i>
            </span>
          </div>

          <input
            id="password"
            type="password"
            name="password"
            class="
              text-sm
              placeholder-gray-500
              pl-10
              pr-4
              rounded-2xl
              border border-gray-400
              w-full
              py-2
              focus:outline-none focus:border-blue-400
            "
            placeholder="Enter your password"
          />
        </div>
      </div>

      <div class="flex w-full">
        <button
          type="submit"
          class="
            flex
            mt-2
            items-center
            justify-center
            focus:outline-none
            text-white text-sm
            sm:text-base
            bg-blue-500
            hover:bg-blue-600
            rounded-2xl
            py-2
            w-full
            transition
            duration-150
            ease-in
          "
        >
          <span class="mr-2 uppercase">Sign Up</span>
          <span>
            <svg
              class="h-6 w-6"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
          </span>
        </button>
      </div>
    </form>
  </div>
</div>
<div class="flex justify-center items-center mt-6">
  <a
    href="#"
    target="_blank"
    class="
      inline-flex
      items-center
      text-gray-700
      font-medium
      text-xs text-center
    "
  >
    <span class="ml-2"
      >You have an account?
      <a
        href="#"
        class="text-xs ml-2 text-blue-500 font-semibold"
        >Login here</a
      ></span
    >
  </a>
</div>
</div>
 --}}


<form class="screen-1 pt-5" style="margin-top: 10px" action="{{ route('register') }}" method="post">
  @csrf
  {{-- <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 640 480" xml:space="preserve">
    <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
      <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(61,71,133); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
    </g>
    <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
      <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
    </g>
    <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
      <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
    </g>
    <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
      <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
    </g>
    <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
      <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
    </g>
    <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
      <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
    </g>
  </svg> --}}
  <div class="password">
    <label class="text-grey-900" for="name">Username</label>
    <div class="sec-2">
      <ion-icon name="lock-closed-outline" role="img" class="md hydrated" aria-label="lock closed outline"></ion-icon>
      <input class="pas" type="text" name="name" placeholder="Username">
      <ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline"></ion-icon>
      @if ($errors -> has('name'))
        <small class="text-red">
          {{  $errors -> first("name") }}
        </small>  
      @endif
    </div>
  </div>
  <div class="password">
    <label class="text-grey-900" for="phone">Phone</label>
    <div class="sec-2">
      <ion-icon name="lock-closed-outline" role="img" class="md hydrated" aria-label="lock closed outline"></ion-icon>
      <input class="pas" type="tel" name="phone" placeholder="Phone">
      <ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline"></ion-icon>
      @if ($errors -> has('phone'))
        <small class="text-red">
          {{  $errors -> first("phone") }}
        </small>  
      @endif
    </div>
  </div>

  <div class="password">
    <label class="text-grey-900" for="email">Email Address or Phone</label>
    <div class="sec-2">
      <ion-icon name="lock-closed-outline" role="img" class="md hydrated" aria-label="lock closed outline"></ion-icon>
      <input class="pas" type="email" name="email" placeholder="example@mail.com">
      <ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline"></ion-icon>
      @if ($errors -> has('email'))
        <small class="text-red">
          {{  $errors -> first("email") }}
        </small>  
      @endif
    </div>
  </div>

  <div class="password">
    <label class="text-grey-900" for="password">Password</label>
    <div class="sec-2">
      <ion-icon name="lock-closed-outline" role="img" class="md hydrated" aria-label="lock closed outline"></ion-icon>
      <input class="pas" type="password" name="password" placeholder="············">
      <ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline"></ion-icon>
      @if ($errors -> has('password'))
        <small class="text-red">
          {{  $errors -> first("password") }}
        </small>  
      @endif
    </div>
  </div>

  <button class="login hover:bg-blue-800" type="submit">Register</button>
  <div class="footer"><a href="{{ route('login') }}"><span class="text-yellow-300 btn hover:bg-yellow-300">Already have an account ? Login</span></a></div>
</form>  

@endsection