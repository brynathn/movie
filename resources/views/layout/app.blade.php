<style>
	* {
		font-family: 'Poppins', sans-serif;
	}

	main{
		background-color: #0f0f0f;
	}

	body{
		background-color: #0f0f0f !important;
	}

	.navbar {
		height: 5em;
		background-color: #0f0f0f;
		position: fixed;
	}

	.navRight a {
		transition: 0.5s;
		color: white;
	}

	.navRight a:hover {
		color: grey;
	}

	.navRight a.active:before {
		position: absolute;
		bottom: 1.2em;
		content: "";
		border-bottom: 1px solid white;
	}

	.navRight a:before {
		position: absolute;
		bottom: 1.2em;
		content: "";
		width: 0%;
		border-bottom: 1px solid white;
		transition: width 0.8s;
	}

	.navRight a:hover:before {
		width: 2em;
	}

	.dropMenu a:hover:before {
		width: 0em;
	}
</style>
<html>

<head>
	<title>BryFlix</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg border border-black border-2">
		<div class="container-fluid">
			<a class="navbar-brand fs-2 fw-bold text-danger" href="#">
				Bry<span class="text-white">Flix</span>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">BryFlix</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body justify-content-end">
					<div class="navbar-nav fs-5" id="navbarContent">
						<ul class="navbar-nav mr-auto gap-3">
							<li class="navRight nav-item">
								<a class=" nav-link" href="/">Home</a>
							</li>
							@if(Session::get('user'))
							@if(Session::get('user')=="admin")
							<li class="navRight nav-item">
								<a class="nav-link" href="/manage">Manage Show</a>
							</li>
							<li class="navRight nav-item">
								<a class="nav-link" href="/penjualan">Sale</a>
							</li>
							@elseif(Session::has('user'))
							<li class="navRight nav-item">
								<a class="nav-link" href="/posting">Show Now</a>
							</li>
							<li class="navRight nav-item">
								<a class="nav-link" href="/mytiket">My Ticket</a>
							</li>
							<li class="nav-item dropdown">
								@endif
								<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{Session::get('name')}}
								</a>
								<ul class="dropMenu dropdown-menu dropdown-menu-end">
									<li><a class="dropdown-item" href="/profile/{{Session::get('user')}}">
											Profile </a></li>
									<li><a class="dropdown-item" href="/logout">
											Logout</a></li>
								</ul>
							</li>

							@else
							<li class="nav-item">
								<a class="nav-link text-dark" href="/login">Login</a>
							</li>
							@endif

						</ul>

					</div>
				</div>
			</div>
		</div>
	</nav>
	<main class="py-4">
		<div class="container-fluid">
			@yield('content')
		</div>
	</main>
	<footer class="py-2 text-dark border border-black border-2" style="background-color: #0f0f0f">
		<div class="container-fluid">
			<div class="row text-center">
				<div class="col-md-12 text-white">
					<small><b>&copy BryFlix</b> </small>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>