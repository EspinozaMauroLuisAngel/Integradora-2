<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3aafa2d207.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>
<body>

<!--Header-->
<nav class="navbar navbar-dark bg-dark"> 
  <div class="container">
    <a class="navbar-brand" href="/">Three Weather Sensors</a>
  </div>
</nav>
<!--Formulario Login-->
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="d-flex justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Bienvenido</h2><br>
              <p class="text-white-50 mb-4"> Por Favor, Introduce tu Email y Contraseña </p>
              <form action="{{ route('login.store') }} " method="POST">
                @csrf  
                <div class="form-group">
                  <i class="fa-solid fa-envelope"></i>
                  <label class="text-white">Email:</label>
                  <input class="form-control" placeholder="Ingresa tu Email..." type="email" name="email" id="email" required>
                  
                  <i class="fa-solid fa-lock"></i>
                  <label class="text-write">Contraseña:</label>
                  <input class="form-control" placeholder="Ingresa tu Contraseña..." type="password" name="password" id="password" required>
                </div><br>
                @error('message')        
                    <p class="border border-red-500 rounded-md bg-red-100 w-full
                    text-red-600 p-2 my-2">* {{ $message }}</p>
                @enderror 
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar Secion</button>
              </form>
              <div class="d-flex justify-content-center text-center mt-4 pt-1"></div>  
              <div>
                <p class="mb-0">¿No tienes una cuenta? <a href="/register" class="text-white-50 fw-bold"> <br> Registrate Gratis</a></p>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  
</body>
@include('sweetalert::alert')
</html>