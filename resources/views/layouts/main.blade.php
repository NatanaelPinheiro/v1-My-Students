<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Bootstrap ICONS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="/css/custom.css">


	<title>@yield('title')</title>
</head>
<body>
	<header id="header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">MyStudents</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="/">Início</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('students.index')}}">Alunos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('classes.index')}}">Turmas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('schooldata.index')}}">Escola</a>
						</li>
						<li class="nav-item">
							<form action="{{route('logout')}}" method="POST" class="d-inline-flex">
								@csrf
								<a  href="{{route('logout')}}"
								class="nav-link" 
								onclick="
								event.preventDefault();
								this.closest('form').submit();"
								>
								Sair
							</a>                                 
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<!-- status msg -->
<div class="msg-status d-none d-flex align-items-center justify-content-center">
</div>

@if(session('msg'))
<div class="msg">
    <p class="d-flex align-items-center justify-content-center">{{ session('msg') }}</p>
</div>
@endif


<main>
	<div class="container">
		@yield('content')
	</div>
</main>

<footer class="bg-dark text-light d-flex align-center justify-content-center align-items-center">
	<p class="text-center">
		Todos os direitos reservados. &copy; {{date('Y')}} MyStudents. 
		<a href="#header">Voltar ao topo</a>
	</p>	
</footer>

<!-- Bootstrap BUNDLE -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- CIRCLE PROGRESS -->
<script type="text/javascript" src="js/circle-progress/circle-progress.min.js"></script>

<!-- SCRIPT -->
<script type="text/javascript" src="/js/script.js"></script>

@stack('scripts')
</body>
</html>