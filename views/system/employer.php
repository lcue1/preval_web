<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuarios</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    :root {
      --primaryColor: #0e1b2e;
      --secundaryColor: #50acdd;
      --textColor: #fff;
      --fontFamily: 'Poppins', sans-serif;
    }
    
    body {
      font-family: var(--fontFamily);
    }
    
    .btn-custom-primary {
      background-color: var(--primaryColor);
      color: var(--textColor);
      border: none;
      transition: all 0.3s ease;
    }
    
    .btn-custom-primary:hover {
      background-color: var(--secundaryColor);
      transform: translateY(-2px);
    }
    
    .btn-custom-secondary {
      background-color: var(--secundaryColor);
      color: var(--textColor);
      border: none;
    }
    
    .btn-custom-secondary:hover {
      background-color: #3d8cb5;
      color: var(--textColor);
    }
    
    .table-custom thead {
      background-color: var(--primaryColor);
      color: var(--textColor);
    }
    
    .table-custom tbody tr:hover {
      background-color: rgba(80, 172, 221, 0.1);
    }
    
    .form-container {
      background-color: #f8f9fa;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(14, 27, 46, 0.1);
    }
    
    .btn-container {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    
    h3 {
      color: var(--primaryColor);
      margin-bottom: 1.5rem;
      font-weight: 600;
    }
    
    .form-label {
      font-weight: 500;
      color: var(--primaryColor);
    }
    
    .alert-custom {
      background-color: var(--secundaryColor);
      color: var(--textColor);
      border: none;
    }
    
    .bi-pencil-square {
      color: var(--primaryColor);
    }
    .title{
      color: var(--secundaryColor);
      border-bottom: 1px solid var(--primaryColor);
    }
    
    @media (max-width: 768px) {
      .btn-container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/adminNav.php"; 


?>
<main class="col-sm-12 col-md-9 col-lg-10 px-4 py-3">
  <h3 class="title">Gestión de usuarios</h3>
  <?php if($message): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div> 
  <?php endif; ?>
  
  <!-- Botones de control -->
  <div class="btn-container">
    <button class="btn btn-custom-primary" type="button" data-bs-toggle="collapse" data-bs-target="#userTableCollapse" aria-expanded="true" aria-controls="userTableCollapse">
      <i class="bi bi-people-fill me-2"></i>Usuarios
    </button>
    <button class="btn btn-custom-primary" type="button" data-bs-toggle="collapse" data-bs-target="#userFormCollapse" aria-expanded="false" aria-controls="userFormCollapse">
      <i class="bi bi-person-plus me-2"></i>Agregar usuario
    </button>
  </div>

  <!-- Contenedor colapsable del FORMULARIO -->
  <div class="collapse mb-4 form-container" id="userFormCollapse">
    <form action="/preval_web/models/users.php" method="post">
      <h3 id="formTitle"><i class="bi bi-person-plus me-2"></i>Agregar usuario</h3>

      <div class="mb-3">
        <label for="userName" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" id="userName" name="userName" placeholder="Ingrese su usuario">
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Nombre completo</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre">
      </div>

      <div class="mb-3">
        <label for="rolId" class="form-label">Rol de usuario</label>
        <?php ;  
        if($getRols["status"] == false): ?>
          <div class="alert alert-danger"><?= $getRols["error"] ?></div>
        <?php else: ?>
          <select name="rolId" class="form-select" required>
            <option value="" id="option_rol_edit">Seleccione un rol</option>
            <?php foreach($getRols["users"] as $rol): ?>
              <option value="<?= $rol->rol_id ?>"><?= $rol->rol_name ?></option>
            <?php endforeach; ?>
          </select>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
      </div>

      <div class="d-flex gap-2">
        <button id="btnSubmit" type="submit" name="operation" class="btn btn-custom-primary" value="save">
          <i class="bi bi-save me-2"></i>Guardar
        </button>
        <a id="cancelBtn" href="/preval_web/pages/system/users.php" class="btn btn-custom-secondary" hidden>
          <i class="bi bi-x-circle me-2"></i>Cancelar
        </a>
      </div>
    </form>

    <?php if(isset($_GET["message"])): ?>
      <div class="alert alert-custom mt-3" id="messageFromServer">
        <i class="bi bi-info-circle me-2"></i><?= htmlspecialchars($_GET["message"]) ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Contenedor colapsable de la TABLA -->
  <div class="collapse show" id="userTableCollapse">
    <div class="table-responsive">
      <table class="table table-custom table-hover">
        <thead>
          <tr>
            <th><i class="bi bi-person me-2"></i>Nombre de usuario</th>
            <th><i class="bi bi-card-text me-2"></i>Nombre</th>
            <th><i class="bi bi-lock me-2"></i>Contraseña</th>
            <th><i class="bi bi-person-badge me-2"></i>Rol</th>
            <th><i class="bi bi-person-badge me-2"></i>Estado</th>
            <th><i class="bi bi-pencil me-2"></i>Editar</th>
            <th><i class="bi bi-trash me-2"></i>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          

          <?php if(empty($employers)): ?> 
            <tr>
              <td colspan="6" class="text-center">No hay registros</td>
            </tr>
          <?php else: ?>
            <?php foreach($employers as $employer): ?>
              <tr>
                <td><?= $employer->userNameEmployer ?></td>
                <td><?= $employer->name ?></td>
                <td>••••••••</td>
                <td><?= $employer->rolId ?></td>
                <td><?= $employer->state ?></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-primary"
                    onclick="editUser(
                      '<?= htmlspecialchars($employer->userName, ENT_QUOTES) ?>',
                      '<?= htmlspecialchars($employer->name, ENT_QUOTES) ?>',
                      '<?= htmlspecialchars($employer->rol_id, ENT_QUOTES) ?>',
                      '<?= htmlspecialchars($employer->rol_name, ENT_QUOTES) ?>',
                      '<?= htmlspecialchars($employer->password, ENT_QUOTES) ?>')">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                </td>
                <td>
                  <a href="<?= "/preval_web/models/users.php?userName=".$employer->userName ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const messageFromServer = document.getElementById("messageFromServer");
  if(messageFromServer){
    setTimeout(() => {
      messageFromServer.remove()
    }, 3000);
  }

  function editUser(userName, name, rol_id, rol_name, password) {
    document.getElementById('formTitle').innerHTML = '<i class="bi bi-pencil-square me-2"></i>Editar usuario';
    let userNameLabel = document.getElementById('userName')
    userNameLabel.value = userName;
    userNameLabel.readOnly = true;
    document.getElementById('name').value = name;
    const rolOption = document.getElementById('option_rol_edit');
    rolOption.value = rol_id;  
    rolOption.textContent = rol_name;
    document.getElementById('password').value = password;
    
    const btnSubmit = document.getElementById('btnSubmit')
    btnSubmit.innerHTML = '<i class="bi bi-arrow-repeat me-2"></i>Actualizar';
    btnSubmit.value = "update";
    document.getElementById('cancelBtn').hidden = false;
    
    // Mostrar el formulario si está oculto
    const formCollapse = new bootstrap.Collapse(document.getElementById('userFormCollapse'), {
      toggle: true
    });
    
    // Ocultar mensaje si existe
    const messageFromServer = document.getElementById("messageFromServer");
    if(messageFromServer){
      messageFromServer.remove()
    }
  }
</script>

</body>
</html>