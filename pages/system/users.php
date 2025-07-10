<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuarios</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
verifySession();
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/pages/parcials/adminNav.php"; 
?>

<!-- Contenido principal --><main class="col-sm-12 col-md-9 col-lg-10">
  <h2>Usuario <?= $_SESSION['name'] ?></h2>
  <div class="container mt-4">
  <div class="row">
    <!-- Formulario -->
    <div class="col-12 col-md-12 col-lg-6 mb-4">
      <form action="/preval_web/models/users.php" method="post">
        <h3 id="formTitle">Agregar usuario</h3>
        <div class="mb-3">
          <label for="userName" class="form-label">Nombre de usuario</label>
          <input type="text" class="form-control" id="userName" name="userName" placeholder="Ingrese su usuario">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Nombre completo</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
        </div>

        <button id="btnSubmit" type="submit" name="operation" class="btn btn-primary" value="save">Guardar</button>
        <a  id="cancelBtn"  href="/preval_web/pages/system/users.php" class="btn btn-primary" hidden>Cancelar</a>
      </form>
<?php if(isset($_GET["message"])): ?>
    <div class="alert alert-info mt-3" id="messageFromServer">
        <?= htmlspecialchars($_GET["message"]) ?>
    </div>
<?php endif; ?>    </div>

    <!-- Tabla -->
    <div class="col-12 col-md-12 col-lg-6">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>Nombre de usuario</th>
              <th>Nombre</th>
              <th>Contraseña</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/models/users.php";
              $users = getAllUsers();
            ?>

            <?php if(empty($users)): ?>
              <tr>
                <td colspan="5" class="text-center">No hay registros</td>
              </tr>
            <?php else: ?>
              <?php foreach($users as $user): ?>
                <tr>
                  <td><?= $user->userName ?></td>
                  <td><?= $user->name ?></td>
                  <td><?= $user->password ?></td>
                  <td>
                    <a href="#"
                      onclick="editUser(
                        '<?= htmlspecialchars($user->userName, ENT_QUOTES) ?>',
                        '<?= htmlspecialchars($user->name, ENT_QUOTES) ?>',
                        '<?= htmlspecialchars($user->password, ENT_QUOTES) ?>')">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </td>
                  <td>
                    <a href=<?=  "/preval_web/models/users.php?userName=".$user->userName ?>  onclick="deleteUser('<?= $user->userName ?>')">
                      <i class="bi bi-x text-danger"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
   const messageFromServer = document.getElementById("messageFromServer");
    if(messageFromServer){
      setTimeout(() => {
        
      messageFromServer.remove()
      }, 3000);
    }


  function editUser(userName, name, password) {
    document.getElementById('formTitle').innerHTML="Editar usuario";
    document.getElementById('userName').value = userName;
    document.getElementById('name').value = name;
    document.getElementById('password').value = password;
    const btnSubmit = document.getElementById('btnSubmit')
    btnSubmit.innerHTML = "Actualizar";
    btnSubmit.value = "update";
    document.getElementById('cancelBtn').hidden =false;
    //delete message from server if exist
    const messageFromServer = document.getElementById("messageFromServer");
    if(messageFromServer){
      messageFromServer.remove()
    }
  }

</script>

</body>
</html>







