<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <!-- Bustrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- font icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg"> 


</head>

<body>
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/header.php"; ?>
    <div class="principalContainer">


        <div class="container my-5">
            <!-- Formulario de Login agregado -->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <img src="../img/logo_preval_s.png" alt="Logo" width="80" class="mb-3">
                                <h3 class="mb-0">Iniciar Sesión</h3>
                            </div>
                            <?php if ($mensaje): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo htmlspecialchars($mensaje); ?>
                                </div>
                            <?php endif; ?>
                            <form id="loginForm" method="POST" action="">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="username" name="userName" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Recordar sesión</label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Ingresar
                                </button>

                                <div class="text-center">
                                    <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script src="/preval_web/js/main.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>