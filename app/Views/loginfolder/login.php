<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login XgeniusApp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Base_url() ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Base_url() ?>/public/css/estilos.css">
    <link rel="stylesheet" href="<?php echo Base_url() ?>/public/css/signin.css">

</head>

<body class="text-center">
    <form class="form-signin">
        <img class="mb-4" src="<?php echo Base_url() ?>/public/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal" id="h1User">INICIAR SESIÓN</h1>
        <label for="inputUser" class="sr-only">Usuario</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
        <div class="checkbox mb-3">
            <label id="recuerdame">
                <input type="checkbox" value="remember-me" id="chkRemember"> Recordarme
            </label>
        </div>
        <a class="btn btn-primary" href="#" id="btnIngresar">INGRESAR</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</body>

    <script src="<?php echo Base_url() ?>/public/js/jquery-3.4.1.slim.min.js"></script>
    <script src="<?php echo Base_url() ?>/public/js/bootstrap.min.js"></script>
    <!-- Por esta vez cargo todos los scripts desde acá -->
    <script src="<?php echo Base_url() ?>/public/js/menu.js"></script>
    <script src="<?php echo Base_url() ?>/public/js/login.js"></script>
</body>
</html>
