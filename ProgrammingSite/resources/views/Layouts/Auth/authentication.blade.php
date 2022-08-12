<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Athenticate</title>

    @include('Layouts.links')
</head>
<body>

    <header class="main-header">
        @include('Layouts.header')
    </header>

    <div class="body">
		<div class="veen">
			<div class="login-btn splits">
				<p class="ml-5">Already an user?</p>
				<button class="active ml-5">Login</button>
			</div>
			<div class="rgstr-btn splits">
				<p>Don't have an account?</p>
				<button>Register</button>
			</div>
			<div class="wrapper">
				<form id="login" action="{{ route('login') }}" method="POST" enctype="multipart/formtabindex="500">
					@csrf
                    <h3>Login</h3>
					<div class="mail">
						<input type="mail" name="email_phone">
						<label class="font-bold">Mail or Phone</label>
					</div>
					<div class="passwd">
						<input type="password" name="password">
						<label class="font-bold">Password</label>
					</div>
					<div class="submit">
						<button class="dark" type="submit">Login</button>
					</div>
				</form>
				<form id="register" method="POST" action="{{ route('register') }}"  tabindex="502">
                    @csrf
					<h3>Register</h3>
					<div class="name">
						<input type="text" name="name">
						<label class="font-bold">Full Name</label>
					</div>
					<div class="mail">
						<input type="mail" name="email">
						<label class="font-bold">Mail</label>
					</div>
					<div class="uid">
						<input type="phone" name="phone">
						<label class="font-bold">Phone</label>
					</div>
					<div class="passwd">
						<input type="password" name="password">
						<label class="font-bold">Password</label>
					</div>
					<div class="submit" type="submit">
						<button class="dark">Register</button>
					</div>
				</form>
			</div>
		</div>	
	</div>

    <footer>
        @include('Layouts.footer') 
     </footer> 

    <script  src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
    <script src="/js/script.js"></script>
</body>
</html>