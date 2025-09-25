<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Comentarios</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg">           
    
          <style>
    :root {
      --primaryColor: #0e1b2e;
      --secundaryColor: #50acdd;
      --textColor: #fff;
      --fontFamily: 'Poppins', sans-serif;
    }
    
    body {
      font-family: var(--fontFamily);
      background-color: #f8f9fa;
    }
    
    .comment-card {
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(14, 27, 46, 0.1);
      margin-bottom: 20px;
      border-left: 4px solid var(--secundaryColor);
      transition: all 0.3s ease;
    }
    
    .comment-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(14, 27, 46, 0.2);
    }
    
    .comment-header {
      background-color: var(--secundaryColor);
      color: var(--textColor);
      padding: 12px 15px;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    
    .comment-body {
      padding: 15px;
      background-color: white;
    }
    
    .comment-footer {
      padding: 10px 15px;
      background-color: #f1f8fe;
      border-bottom-left-radius: 8px;
      border-bottom-right-radius: 8px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .comment-status {
      display: inline-block;
      padding: 3px 8px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 500;
    }
    
    .status-pending {
      background-color: #fff3cd;
      color: #856404;
    }
    
    .status-resolved {
      background-color: #d4edda;
      color: #155724;
    }
    
    .btn-comment {
      background-color: var(--secundaryColor);
      color: var(--textColor);
      border: none;
    }
    
    .btn-comment:hover {
      background-color: #3d8cb5;
      color: var(--textColor);
    }
    
    .title {
      color: var(--secundaryColor);
      border-bottom: 1px solid var(--primaryColor);
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    
    .comment-date {
      color: #6c757d;
      font-size: 14px;
    }

    /* Estilos adicionales para el modal */
    .modal-header {
      background-color: var(--primaryColor);
      color: var(--textColor);
    }
    
    .btn-close-white {
      filter: invert(1);
    }
  </style>
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/employerNab.php"; 
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/utils/flashMessage.php";

// Debug: Verificar estructura de comentarios
// echo '<pre>'; print_r($comments); echo '</pre>';
?>

<main class="container py-4">
  <h2 class="title">Gestión de Comentarios</h2>
  
  <?php 
  $error = FlashMessage::get('error');
  $success = FlashMessage::get('success');

  if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; 

  if ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif;
  ?>
  
  <div class="row">
    <?php if (empty($comments)): ?>
\            <div class="alert alert-info text-center">
                <strong>No hay comentarios disponibles.</strong>
            </div>
    <?php else: ?>
    <?php foreach($comments as $comment): 
      // Asegurar que el ID existe y es válido
      
      $commentId = isset($comment->id) ? $comment->id : uniqid();
    ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="comment-card">
          <div class="comment-header">
            <h5 class="mb-0"><?= htmlspecialchars($comment->name) ?></h5>
          </div>
          
          <div class="comment-body">
            <p class="mb-2"><strong>Email:</strong> <?= htmlspecialchars($comment->email) ?></p>
            <p class="mb-2"><strong>Teléfono:</strong> <?= htmlspecialchars($comment->phone) ?></p>
            <div class="mb-3">
              <p class="mb-1"><strong>Comentario:</strong></p>
              <p><?= htmlspecialchars($comment->coment) ?></p>
            </div>
          </div>
          
          <div class="comment-footer">
            <span class="comment-date">
              <i class="bi bi-calendar me-1"></i>
              <?= date('d/m/Y', strtotime($comment->date)) ?>
            </span>
            <span class="comment-status <?= $comment->state == 'P' ? 'status-pending' : 'status-resolved' ?>">
              <?= $comment->state == 'P' ? 'Pendiente' : 'Resuelto' ?>
            </span>
          </div>
          
          <!-- Button trigger modal -->
          <button type="button" 
                  class="btn <?= $comment->state == 'P' ? 'btn-warning' : 'btn-primary' ?> w-100" 
                  data-bs-toggle="modal" 
                  data-bs-target="#commentModal<?= $commentId ?>">
            <?= $comment->state == 'P' ? 'Atender' : 'Ver' ?>
          </button>
        </div>
      </div>
      

      <!-- Modal -->
      <div class="modal fade" id="commentModal<?= $commentId ?>" tabindex="-1" aria-labelledby="commentModalLabel<?= $commentId ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="commentModalLabel<?= $commentId ?>">
                <?= $comment->state == 'P' ? 'Atender Comentario' : 'Editar Respuesta' ?>
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="commentForm<?= $commentId ?>" action="" method="post">
                <input type="hidden" name="idComment" value="<?= $comment->idComent ?>">
                
                <div class="mb-3">
                  <label class="form-label fw-bold">Cliente:</label>
                  <p><?= htmlspecialchars($comment->name) ?></p>
                </div>
                
                <div class="mb-3">
                  <label class="form-label fw-bold">Comentario:</label>
                  <div class="p-3 bg-light rounded">
                    <?= htmlspecialchars($comment->coment) ?>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="response<?= $commentId ?>" class="form-label fw-bold">
                    <?= $comment->state == 'P' ? 'Respuesta:' : 'Editar respuesta:' ?>
                  </label>
                  <textarea class="form-control" id="resolutionDetails<?= $commentId ?>" name="resolutionDetails" rows="4" required><?= 
                    isset($comment->resolutionDetails) ? htmlspecialchars($comment->resolutionDetails) : '' 
                  ?></textarea>
                </div>
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" form="commentForm<?= $commentId ?>" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
    <?php endif; ?>
</main>

<!-- Bootstrap JS Bundle with Popper (solo una vez) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    
</script>

</body>
</html>