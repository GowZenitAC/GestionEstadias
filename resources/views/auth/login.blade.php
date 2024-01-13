@extends('layout.base')
@section('titulo','Login')
@section('contenido')

<!-- inicio div padre -->
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Formulario de Inicio de Sesión</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Iniciar Sesión</h5>
          
          <form action="" method="POST" class="login-form">
							@csrf
							<div class="form-group">
								<input type="email" class="form-control rounded-left" placeholder="Correo" id="email" name="email">
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" placeholder="Contraseña" id="password" name="password">
							</div>

							@error('message')

							<p class="form-control rounded-left border-danger text-red" style="color:red;">{{$message}}</p>

							@enderror
							
							<div class="form-group">
								<button type="submit" class="btn btn-dark">Iniciar</button>

							</div>
							<div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    No registrado?
                                    <a href="register" class="fw-bold">Registrate aqui!</a>
                                </span>
                            </div>
						</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts de Bootstrap y otros -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<!-- fin div padre -->


@endsection