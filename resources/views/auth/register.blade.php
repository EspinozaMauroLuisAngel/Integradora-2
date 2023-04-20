<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sing Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3aafa2d207.js" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>
<body>

<!--Header-->
<nav class="navbar navbar-dark bg-dark"> 
  <div class="container">
    <a class="navbar-brand" href="/">Three Weather Sensors</a>
  </div>
</nav>

<!--Formulario Registro-->
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
  				            <div class="container">
					            <div class="row main">
					        	    <div class="panel-heading">
					        	        <div class="panel-title text-center">
					        	    	     <h1 class="title">Registrate Gratis</h1>
					        	            
					        	    	</div>
					        	    </div>
					        	    <div class="main-login main-center">
                                        <form action="{{ route('register.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <i class="fa-regular fa-user"></i>
                                                <label class="text-white">Nombre(s):</label>
                                                <input class="form-control" type="text" name="name" placeholder="Ingresa tu Nombre(s) Completo" required >
                                            </div>
                                            <div class="form-group">
                                                <i class="fa-regular fa-user"></i>
                                                <label class="text-white">Apellidos:</label>
                                                <input class="form-control" type="text" name="lastname" placeholder="Ingresa tus Apellidos" required >
                                            </div>
                                            <div class="form-group">
                                                <i class="fa-regular fa-calendar"></i>
                                                <label class="text-white">Fecha de Nacimiento:</label>
                                                <input class="form-control" type="date" name="date" placeholder="Ingresa tu Fecha de Nacimiento" required>
                                            </div>
                                            <div class="form-group">
                                                <i class="fa-solid fa-envelope"></i>                                   
                                                 <label class="text-white">Email:</label>
                                                <input class="form-control" type="email" name="email" placeholder="Ingresa tu Email" required >
                                            </div>
                                            <div class="form-group">
                                                <i class="fa-solid fa-lock"></i>
                                                <label class="text-write">Contraseña:</label>
                                                <input class="form-control" type="password" name="password" placeholder="Ingresa tu Contraseña" required >
                                            </div><br>
                                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Registrarme</button>
                                        </form>
							            <div>
                                            <p class="mb-0">¿Ya tienes una cuenta? <a href="/login" class="text-white-50 fw-bold"> <br> Inicia Secion</a> </p>
                                        </div>
    		                        </div>
			                    </div>
			        	    </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@include('sweetalert::alert')
</body>
</html>