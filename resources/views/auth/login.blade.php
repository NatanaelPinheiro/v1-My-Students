<!doctype html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>My Students | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/auth/signin.css" rel="stylesheet">
  </head>
  <body>
    <main class="form-signin text-center">
      <h1 class="text-center text-primary mb-5">My Students</h1>
      <form  method="POST" action="{{route('login.auth')}}">
        @csrf
        @method('POST')
        <h2 class="h3 mb-3 fw-normal">logue para continuar!</h2>

        <div class="form-floating">
          <input type="email" id="email" name="email" class="form-control" id="email" placeholder="name@example.com">
          <label for="email">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <label for="password">Senha</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Logar</button>
        <p class="mt-5 mb-3 text-muted">&copy; {{date('Y')}}</p>
      </form>

      @if(session('msg'))
      <div class="alert alert-danger">
        <p>{{session('msg')}}</p>
      </div>
      @endif
    </main>

    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
  </html>