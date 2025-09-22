
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="mapModalLabel">Calcular distancia (Leaflet + OSRM)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="map"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="resetMapa()">Limpiar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="aceptarDistancia()">Aceptar</button>
      </div>
    </div>
  </div>
</div>