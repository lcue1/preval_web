<div class="modal" tabindex="-1" id="productModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      
      <!-- Encabezado -->
      <div class="modal-header bg-primary text-white">
        <h3 class="modal-title"><i class="bi bi-box2-fill me-2"></i>Reservorios</h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Cuerpo -->
      <div class="modal-body overflow-auto">
        
        <!-- Imagen -->
        <div class="mb-4 text-center">
          <img src="../img/img_productos/tanque 20mil_lt.jpeg" 
               class="img-fluid rounded shadow w-100"
               alt="Tanque reservorio de fibra de vidrio"
               style="max-height: 400px; object-fit: cover;">
        </div>
        
        <!-- Título -->
        <h3 class="mb-4 text-center text-primary">Catálogo de Capacidades</h3>
        
        <!-- Versión móvil -->
        <div class="d-lg-none">
          <div class="row row-cols-1 row-cols-md-2 g-4">
            
            <!-- Ejemplo de card -->
            <div class="col">
              <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-primary">Tanque 500 litros</h5>
                  <p class="card-text"><i class="bi bi-tools me-2"></i>Fibra de vidrio tipo E</p>
                </div>
                <div class="card-footer bg-light border-0 d-flex justify-content-between align-items-center">
                  <span class="badge bg-primary rounded-pill fs-6">$3,000</span>
                  <button class="btn btn-sm btn-outline-primary">Detalles</button>
                </div>
              </div>
            </div>
            
            <!-- Repite las demás tarjetas con sus estilos -->
            <!-- ... (tus cards del 1000, 2500, 5000, etc.) ... -->

          </div>
        </div>
        
        <!-- Versión escritorio -->
        <div class="d-none d-lg-block">
          <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0"><i class="bi bi-clipboard2-data me-2"></i>Especificaciones Técnicas</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th class="text-center">Capacidad</th>
                      <th class="text-center">Material</th>
                      <th class="text-center">Ubicación</th>
                      <th class="text-center">Precio</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-primary text-center">500 litros</td>
                      <td>Fibra de vidrio tipo E</td>
                      <td class="text-center"><span class="badge bg-info">Interior</span></td>
                      <td class="text-center"><span class="badge bg-primary rounded-pill fs-6">$3,000</span></td>
                    </tr>
                    <tr class="table-warning">
                      <td class="fw-bold text-warning text-center">1,000 litros</td>
                      <td>Fibra de vidrio reforzada</td>
                      <td class="text-center"><span class="badge bg-warning text-dark">Exterior</span></td>
                      <td class="text-center"><span class="badge bg-primary rounded-pill fs-6">$4,500</span></td>
                    </tr>
                    <!-- Resto de filas con sus estilos -->
                    <!-- ... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      <!-- Footer -->
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-1"></i> Cerrar
        </button>
        <a type="button" class="btn btn-primary text-white" href="/preval_web/public/contacto.php">
          <i class="bi bi-chat-dots me-1"></i> Solicitar Cotización
</a>
      </div>
    </div>
  </div>
</div>
